<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}
// $booked = json_encode( $this->get_all_bookings_for_product( $product->get_id() ) );
echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<form class="cart" action="<?php echo esc_url( get_permalink() ); ?>" method="post" enctype='multipart/form-data'>
		<div class="booking-wraper">
			<div>
				<input type="hidden" name="dgc_booked_price" id="dgc_booked_price" value=''/>
				<input type="hidden" id="dgc_product_id" value='<?php echo $product->get_id();?>'/>
				
				<input type="hidden"  name="dgc_book_from_date"  id="" class="dgc-date-from dgc-datepicker" value="">
				<input type="hidden"  name="dgc_book_to_date"  id="" class="dgc-datepicker dgc-date-to" value="">

				<input type="hidden" id="plugin_dir_url" value="<?php echo plugin_dir_url( dirname( __FILE__ ) )?>">
				<!-- <p><?php //_e('Pick a booking period','dgc-booking')?></p> -->
			</div>
			<div>
				<?php
				include_once('booking-callender/class-dgc-booking-callender.php');
				$callender = new dgc_booking_callender();
				$callender->output_callender();
				?>
			</div>
		</div>

		<?php
			do_action( 'woocommerce_before_add_to_cart_button' );
			do_action( 'woocommerce_before_add_to_cart_quantity' );
			/*woocommerce_quantity_input( array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
			) );*/

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
		<input type="hidden" name="add-to-cart" value="<?php echo $product->get_id();?>">
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt disabled dgc_bookings_book_now_button"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_button' );
		?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
