<?php
class dgc_booking_core{
	public function __construct() {
		add_action( 'woocommerce_before_calculate_totals', array( $this, 'dgc_update_custom_cart_price'), 1, 1 );
		add_action( 'woocommerce_loaded', array( $this,'register_booking_product_product_type' ) );
		
		add_action( 'woocommerce_dgc_booking_add_to_cart', array( $this, 'dgc_add_booking_product_to_cart' ), 30 );
		add_filter( 'woocommerce_add_cart_item_data', array( $this, 'dgc_add_booking_infos_with_cart_item' ), 10, 3 ); //Add Customer Data to WooCommerce Cart

		add_filter( 'woocommerce_get_item_data', array( $this, 'dgc_disply_item_booking_infos' ), 10, 2 ); //Display Details as Meta in Cart
		add_action( 'woocommerce_checkout_create_order_line_item', array( $this, 'dgc_add_booking_info_order_line_item_meta' ), 10, 4 ); //Add Custom Details as Order Line Items
		
		add_filter( 'wc_add_to_cart_message_html', array($this, 'dgc_added_to_cart_message'), 10,2 );
		add_action( 'woocommerce_get_cart_item_from_session', array( $this, 'dgc_get_cart_from_session' ), 10, 3 ); 

		// add_filter('woocommerce_hidden_order_itemmeta', array($this, 'dgc_woocommerce_hidden_order_itemmeta'), 10, 1);
		
		add_filter('woocommerce_order_item_get_formatted_meta_data',array($this, 'dgc_hide_details_from_checkout_and_email'), 10, 1);
	}

	public function dgc_hide_details_from_checkout_and_email($meta)
	{
		// error_log("meta : ".print_r($meta,1));
		$booked_from_exists = false;
		$booked_to_exists = false;
		foreach($meta as $meta_single)
		{
			// error_log('meta_single'.print_r($meta_single,1));	
			// error_log("key".$meta_single->key);
			if($meta_single->key == 'Booked From')
			{
				$booked_from_exists = true;
			}
			else if($meta_single->key == 'Booked To')
			{
				$booked_to_exists = true;
			}
		}
		// error_log('$booked_from_exists'.$booked_from_exists);
		// error_log('booked_to_exists'.$booked_to_exists);
		if($booked_from_exists === true)
		{
			$criteria = array(  'key' => __('From','bookings-and-appointments-for-woocommerce') );
			$meta = wp_list_filter( $meta, $criteria, 'NOT' );
		}
		if ($booked_to_exists === true) 
		{
			$criteria = array(  'key' => __('To','bookings-and-appointments-for-woocommerce') );
			$meta = wp_list_filter( $meta, $criteria, 'NOT' );
		}
		return $meta;
	}

	/**
	* Get the booking cost from session and make it part of cart item
	* @param obj cart
	*/
	public function dgc_get_cart_from_session( $cart_item){
			if( isset($cart_item['dgc_booked_price']) ){
				$cart_item['data']->set_price($cart_item['dgc_booked_price']);
			}
			return $cart_item;

	}

	public function dgc_added_to_cart_message( $message, $products ){
		
		$is_booking_product = false;
		foreach ($products as $product_id => $quantity) {
		
			$interval_type = get_post_meta( $product_id, "_dgc_book_interval_type", 1 );
			if( !empty( $interval_type ) ){
				$is_booking_product = true;
				break;
			}
		}
		
		if( $is_booking_product ){
			$message = '<a href="'.wc_get_page_permalink( 'cart' ).'" class="button wc-forward">'.__('View cart','bookings-and-appointments-for-woocommerce').'</a> '.__('Booking Done. Please check cart for payment.','bookings-and-appointments-for-woocommerce');
			$message = apply_filters( 'dgc_booking_add_to_cart_message_html', $message, $products );
		}

		return $message;
	}

	public function dgc_update_custom_cart_price( $cart_object ) {
		foreach ( $cart_object->cart_contents as $cart_item_key => $value ) { 
			if( isset($value['dgc_booked_price']) ){
				// Version 2.x
				//$value['data']->price = $value['dgc_booked_price']

				// Version 3.x / 4.x
				$value['data']->dgc_set_booked_price( $value['data']->get_id(), $value['dgc_booked_price'] );
			}
		}
	}


	/**
	* Forcefully convert WP date format into 'Y-m-d' format
	*/
	private function dgc_formate_date($date){
		$new_date = DateTime::createFromFormat( get_option( 'date_format' ), $date );
		if( is_object($new_date) ){
			return $new_date->format('Y-m-d');
		}else{
			//The format 'F j, Y' is not working with 'createFromFormat'
			return date('Y-m-d', strtotime($date));
		}

	}

	public function dgc_add_booking_infos_with_cart_item($cart_item_data, $product_id, $variation_id){
		if(isset($_REQUEST['dgc_book_from_date'])){
			if( !class_exists('dgc_booking_cron_manager') ){
				include_once('class-dgc-booking-cron-manager.php');
			}
			$cron_manager = new dgc_booking_cron_manager();
			$cart_item_data['dgc_book_from_date'] 		= sanitize_text_field( $_REQUEST['dgc_book_from_date'] );
			$cart_item_data['dgc_book_to_date'] 			= sanitize_text_field( $_REQUEST['dgc_book_to_date'] );
			$cart_item_data['dgc_booked_price'] 			= sanitize_text_field( $_REQUEST['dgc_booked_price'] );
			$cart_item_data['dgc_booking_freezer_id'] 	= $cron_manager->freeze_booking_slot( $product_id, $cart_item_data['dgc_book_from_date'], $cart_item_data['dgc_book_to_date'] );
		}
		return $cart_item_data;
	}

	
	function dgc_disply_item_booking_infos($item_data, $cart_item){
		//If case of fixed block of time, show only from date
		if( array_key_exists('dgc_book_from_date', $cart_item) && $cart_item['dgc_book_from_date'] == $cart_item['dgc_book_to_date'] ){
			$item_data[] = array(
				'key'   => __('Booked','bookings-and-appointments-for-woocommerce'),
				'value' => dgc_booking_ajax_manager::dgc_get_date_in_wp_format($cart_item['dgc_book_from_date']),
			);
		}else{
			if(array_key_exists('dgc_book_from_date', $cart_item)){
				$item_data[] = array(
					'key'   => __('Booked from','bookings-and-appointments-for-woocommerce'),
					'value' => dgc_booking_ajax_manager::dgc_get_date_in_wp_format($cart_item['dgc_book_from_date']),
				);
			}
			if(array_key_exists('dgc_book_to_date', $cart_item)){
				$item_data[] = array(
					'key'   => __('Booked to','bookings-and-appointments-for-woocommerce'),
					'value' => dgc_booking_ajax_manager::dgc_get_date_in_wp_format($cart_item['dgc_book_to_date']),
				);
			}
		}
		
		return $item_data;
	}

	function dgc_add_booking_info_order_line_item_meta($item, $cart_item_key, $values, $order){
		//If case of fixed block of time, show only from date
		if(array_key_exists('dgc_book_from_date', $values) && $values['dgc_book_from_date']==$values['dgc_book_to_date']){
			$item->add_meta_data(__('From','bookings-and-appointments-for-woocommerce'),$values['dgc_book_from_date']);
			$item->add_meta_data(__('Booked From','bookings-and-appointments-for-woocommerce'),dgc_booking_ajax_manager::dgc_get_date_in_wp_format($values['dgc_book_from_date']));
		}else{
			if(array_key_exists('dgc_book_from_date', $values)){
				$item->add_meta_data(__('From','bookings-and-appointments-for-woocommerce'),$values['dgc_book_from_date']);
				$item->add_meta_data(__('Booked From','bookings-and-appointments-for-woocommerce'),dgc_booking_ajax_manager::dgc_get_date_in_wp_format($values['dgc_book_from_date']));
			}

			if(array_key_exists('dgc_book_to_date', $values)){
				$item->add_meta_data(__('To','bookings-and-appointments-for-woocommerce'),$values['dgc_book_to_date']);
				$item->add_meta_data(__('Booked To','bookings-and-appointments-for-woocommerce'),dgc_booking_ajax_manager::dgc_get_date_in_wp_format($values['dgc_book_to_date']));
			}
		}

		if(array_key_exists('dgc_booked_price', $values)){
			$item->add_meta_data(__('Cost','bookings-and-appointments-for-woocommerce'),$values['dgc_booked_price']);
		}

		/*if(array_key_exists('dgc_from_book_time', $values)){
			$item->add_meta_data('_dgc_from_book_time',$values['dgc_from_book_time']);
		}
		if(array_key_exists('dgc_to_book_time', $values)){
			$item->add_meta_data('_dgc_to_book_time',$values['dgc_to_book_time']);
		}*/
	}

	public function dgc_woocommerce_hidden_order_itemmeta($hidden_meta)
	{
		// error_log('hidden meta');
		$hidden_meta[] = 'From';
		$hidden_meta[] = 'To';
		return $hidden_meta;
	}

	public function dgc_add_booking_product_to_cart() {
		ob_start();
		include( 'html-dgc-booking-add-to-cart.php' );
		echo ob_get_clean();
	}

	/**
	 * Register the custom product type
	 */
	public static function register_booking_product_product_type() {
		include_once( 'class-dgc-booking-wc-product.php' );
	}
	
}
new dgc_booking_core;
