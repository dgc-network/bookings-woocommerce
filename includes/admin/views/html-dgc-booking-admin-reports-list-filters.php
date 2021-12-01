<div class="tablenav <?php echo esc_attr( $which ); ?>" >

	<div class="dgc-list-bulkaction-wraper">
		<?php $this->bulk_actions( $which );?>
	</div>

	<div class="dgc-list-filter-wraper">

		<div class="dgc-filter-item">
			<?php
			$args = array(
			    'type' => 'dgc_booking',
			);
			$products = wc_get_products( $args );
			?>
			<select name="dgc_filter_product_ids" id="dgc_filter_product_ids" class="wc-enhanced-select dgc_filter_product_ids"><?php
				echo '<option value="">'.__( 'Choose product', 'bookings-and-appointments-for-woocommerce' ).'</option>';
				foreach ( $products as $key => $product ) {
					if( !empty($product) ){
						echo '<option ' . selected( $dgc_filter_product_ids, $product->get_id() ) . ' value="' . $product->get_id() .'">' . $product->get_name() .'</option>';
					}
				}?>
			</select>

		</div>

		<div class="dgc-filter-item">
			<input type="text" id="dgc_filter_from" class="dgc_filter_from" placeholder="<?php _e('From', 'bookings-and-appointments-for-woocommerce')?>" value="<?php echo $dgc_filter_from;?>">
		</div>

		<div class="dgc-filter-item">
			<input type="text" id="dgc_filter_to" class="dgc_filter_to" placeholder="<?php _e('To', 'bookings-and-appointments-for-woocommerce')?>" value="<?php echo $dgc_filter_to;?>">
		</div>

		<div class="dgc-filter-item">
			<input type="button" class="button btn_filter" id="btn_filter" value="Filter">
		</div>

		<br class="clear">

	</div>

	<div class="dgc-list-pagination-wraper">
		<?php $this->pagination( $which );?>
	</div>

</div>
<script>
jQuery(document).ready(function($) {

	$("#btn_filter").on("click", function(){
		
		admin_url = '<?php echo admin_url("admin.php?page=all-bookings&paged=1")?>';
		filter_product_ids 	= $("#dgc_filter_product_ids").val() ? $("#dgc_filter_product_ids").val() : '';
		filter_from 		= $("#dgc_filter_from").val() 		? $("#dgc_filter_from").val() 		: '';
		filter_to 			= $("#dgc_filter_to").val() 			? $("#dgc_filter_to").val() 			: '';

		window.location = admin_url + "&dgc_filter_product_ids="+filter_product_ids+"&dgc_filter_from="+filter_from+"&dgc_filter_to="+filter_to;
	});

	jQuery( "#dgc_filter_from" ).datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat: 'yy-mm-dd',
	});

	jQuery( "#dgc_filter_to" ).datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat: 'yy-mm-dd',
	});
})
</script>