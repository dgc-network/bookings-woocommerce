<?php
	$dgc_calendar_color 			= get_option('dgc_booking_settings_calendar_color') ;
	$dgc_calendar_month_color 	= $dgc_calendar_color['dgc_calendar_month_color'] ;
	$booking_full_color 		= $dgc_calendar_color['booking_full_color'];
	$selected_date_color 		= $dgc_calendar_color['selected_date_color'];
	$booking_info_wraper_color 	= $dgc_calendar_color['booking_info_wraper_color'];
	$dgc_calendar_weekdays_color = $dgc_calendar_color['dgc_calendar_weekdays_color'];
	$dgc_calendar_days_color 	= $dgc_calendar_color['dgc_calendar_days_color'];

	$dgc_calendar_design=isset($dgc_calendar_color['dgc_calendar_design'])?$dgc_calendar_color['dgc_calendar_design']:'';

	?>
<style type="text/css">
	
	<?php if($dgc_calendar_design==1 || empty($dgc_calendar_month_color)){?>
		.single-product div.product form.cart
		{
			background-color: #1791ce !important;
		}
		.single-product div.product form.cart
		{
			background-color: #1791ce !important;
		}
		.booking-info-wraper{
			background: #ffffff !important;  
		}
		.selected-date, .timepicker-selected-date, li.dgc-calendar-date.mouse_hover, .time-picker-wraper #dgc-calendar-time li.dgc-calendar-date , li.dgc-calendar-date.today:hover, .dgc-calendar-date.today{
		    border: 0px solid transparent;
		}

		.time-picker-wraper #dgc-calendar-time li.dgc-calendar-date {
		    border: 1px solid #ffffff;
		}
		li.dgc-calendar-date.mouse_hover, li.dgc-calendar-date.today:hover, li.dgc-calendar-date:hover{
		  background: #4fb5e9;
		}
		.dgc-next:hover, .dgc-prev:hover{
		  color: #4d8e7a ;
		}
		li.dgc-calendar-date.de-active.booking-full:hover, .dgc-calendar-date.booking-full {
		  background-color: #dadada;
		  cursor: text;
		}
		.dgc_bookings_book_now_button,.dgc_bookings_book_now_button:hover{
		  background-color: #1373a3 !important;
		    border: 1px #29aced !important;
		}
		.dgc_bookings_book_now_button:before {
		  background: #2098D1;
		}
		<?php 
		} elseif ($dgc_calendar_design==2) {?>
		.single-product div.product form.cart
		{
			background-color: #a5a5a5 !important
		}
		.single-product div.product form.cart
		{
			background-color: #a5a5a5 !important
		}
		.booking-info-wraper{
			background: #ffffff !important;  
		}
		.selected-date, .timepicker-selected-date, li.dgc-calendar-date.mouse_hover, .time-picker-wraper #dgc-calendar-time li.dgc-calendar-date , li.dgc-calendar-date.today:hover, .dgc-calendar-date.today{
		    border: 0px solid transparent;
		}

		.time-picker-wraper #dgc-calendar-time li.dgc-calendar-date {
		    border: 1px solid #ffffff;
		}

		li.dgc-calendar-date.mouse_hover, li.dgc-calendar-date.today:hover, li.dgc-calendar-date:hover, .timepicker-selected-date, .selected-date, li.dgc-calendar-date.today.timepicker-selected-date{
			background: #f4fafd;
    		color: #131515 !important;
		}
		.dgc-next:hover, .dgc-prev:hover{
			color: #e9e6e6;
		}
		li.dgc-calendar-date.de-active.booking-full:hover, .dgc-calendar-date.booking-full {
		  background-color: #dadada;
		  cursor: text;
		}
		.dgc_bookings_book_now_button,.dgc_bookings_book_now_button:hover{
		  background-color: #5f5858 !important;
		}
		.dgc_bookings_book_now_button:before {
		  background: #2b2828;
		}
		<?php 
		} elseif ($dgc_calendar_design==3) {?>
		.single-product div.product form.cart
		{
			background-color: #ff005e !important;
			background-image: linear-gradient(135deg, #362dc7, #00b8ff);
		}
		.booking-info-wraper{
			background: #ffffff !important;  
		}
		.selected-date, .timepicker-selected-date, li.dgc-calendar-date.mouse_hover, .time-picker-wraper #dgc-calendar-time li.dgc-calendar-date , li.dgc-calendar-date.today:hover, .dgc-calendar-date.today{
		    border: 0px solid transparent;
		}

		.time-picker-wraper #dgc-calendar-time li.dgc-calendar-date {
		    border: 1px solid #ffffff;
		}

		li.dgc-calendar-date.mouse_hover, li.dgc-calendar-date.today:hover, li.dgc-calendar-date:hover, .timepicker-selected-date, .selected-date, li.dgc-calendar-date.today.timepicker-selected-date{
			background: #f4fafd;
    		color: #131515 !important;
		}
		.dgc-next:hover, .dgc-prev:hover{
			color: #806c6c;
		}
		li.dgc-calendar-date.de-active.booking-full:hover, .dgc-calendar-date.booking-full {
		  background-color: #8fa2f5;
		  cursor: text;
		}
		.dgc_bookings_book_now_button,.dgc_bookings_book_now_button:hover{
		  background-color: #085c86 !important;
		    border: 1px #efefef !important;
		}
		.dgc_bookings_book_now_button:before {
		  background: #052433;
		}
		<?php 
		} elseif ($dgc_calendar_design==4) {?>
		.single-product div.product form.cart
		{
			background-color: #ff005e !important;
			background-image: linear-gradient(135deg, #f30a0a, #131111cf,#1000fd)
		}
		.booking-info-wraper{
			background: #ffffff !important; 
		}
		.selected-date, .timepicker-selected-date, li.dgc-calendar-date.mouse_hover, .time-picker-wraper #dgc-calendar-time li.dgc-calendar-date , li.dgc-calendar-date.today:hover, .dgc-calendar-date.today{
		    border: 0px solid transparent;
		}

		.time-picker-wraper #dgc-calendar-time li.dgc-calendar-date {
		    border: 1px solid #ffffff;
		}

		li.dgc-calendar-date.mouse_hover, li.dgc-calendar-date.today:hover, li.dgc-calendar-date:hover, .timepicker-selected-date, .selected-date, li.dgc-calendar-date.today.timepicker-selected-date{
			background: #f4fafd;
    		color: #131515 !important;
		}
		.dgc-next:hover, .dgc-prev:hover{
			color: #e9e6e6;
		}
		li.dgc-calendar-date.de-active.booking-full:hover, .dgc-calendar-date.booking-full {
		  background-color: #ff3406;
		  cursor: text;
		}
		.dgc_bookings_book_now_button,.dgc_bookings_book_now_button:hover{
		  	background-color: #a93837 !important;
		    border: 1px #f50d06 !important;
		}
		.dgc_bookings_book_now_button:before {
		  background: #ad0000;
		}
		<?php 
		} elseif ($dgc_calendar_design==5) {?>
		.single-product div.product form.cart
		{
			background-color: #ff005e !important;
			background-image: radial-gradient(#271be0, #7725c1,#2700fd);
		}
		.booking-info-wraper{
			background: #ffffff !important; 
		}
		.selected-date, .timepicker-selected-date, li.dgc-calendar-date.mouse_hover, .time-picker-wraper #dgc-calendar-time li.dgc-calendar-date , li.dgc-calendar-date.today:hover, .dgc-calendar-date.today{
		    border: 0px solid transparent;
		}

		.time-picker-wraper #dgc-calendar-time li.dgc-calendar-date {
		    border: 1px solid #ffffff;
		}

		li.dgc-calendar-date.mouse_hover, li.dgc-calendar-date.today:hover, li.dgc-calendar-date:hover, .timepicker-selected-date, .selected-date, li.dgc-calendar-date.today.timepicker-selected-date{
			background: #f4fafd;
    		color: #131515 !important;
		}
		.dgc-next:hover, .dgc-prev:hover{
			color: #e9e6e6;
		}

		li.dgc-calendar-date.de-active.booking-full:hover, .dgc-calendar-date.booking-full {
		  background-color: #a7a8ec;
		  cursor: text;
		}
		.dgc_bookings_book_now_button,.dgc_bookings_book_now_button:hover{
		  	background-color: #9149ff !important;
		    border: 1px #d4c2ef !important;
		}
		.dgc_bookings_book_now_button:before {
		  background: #3a1071;
		}
		<?php }
		else{?>
			.dgc-calendar-month{
					background: <?php echo $dgc_calendar_month_color ?> !important;
				}
				.booking-full{
					background: <?php echo $booking_full_color ?> !important;
				}
				.timepicker-selected-date, .selected-date{
					background: <?php echo $selected_date_color ?> !important;
				}
				.booking-info-wraper{
					background: <?php echo $booking_info_wraper_color ?> !important;
				}
				.dgc-calendar-weekdays{
					background: <?php echo $dgc_calendar_weekdays_color ?> !important;
				}
				.dgc-calendar-days{
					background: <?php echo $dgc_calendar_days_color ?> !important;
				}
		<?php }?>
</style>
<div class="time-picker-wraper">
	<input id="calender_type" value="time" type="hidden">
	<input type="hidden" id="book_interval_type" value="<?php echo $product->get_interval_type()?>">
	<input type="hidden" id="book_interval" value="<?php echo $product->get_interval()?>">

	<!-- <div class="callender-error-msg"></div> -->
	<?php 
		$timezone = get_option('timezone_string');
		if( empty($timezone) ){
			$time_offset = get_option('gmt_offset');
			$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
		}
		date_default_timezone_set($timezone);
		// Start date
		$month_start_date = date('Y').'-'.date('m').'-01';
		
		$this->dgc_generate_date_calendar_for_timepicker($month_start_date); 
	?>
	

	<ul class="dgc-calendar-days" id="dgc-calendar-days">	<?php
		
		$shop_opening_time 	= get_post_meta( $product->get_id(), "_dgc_book_working_hour_start", 1 );

		$shop_opening_time = !empty( $shop_opening_time ) ? date( 'H:i',strtotime($shop_opening_time) ) : '00:00';
		
		$start_date = date('Y-m-d').' '.$shop_opening_time;
		// End date
		echo $this->dgc_generate_days_for_period($month_start_date,'','','time-picker');
		?>
	</ul>
	<br>
	<div class="time-picker">
		<ul class="dgc-calendar-days" id="dgc-calendar-time">
			<center>
				<?php _e("Please Pick a Date", "bookings-and-appointments-for-woocommerce")?>
			</center>
		</ul>
	</div>
</div>
<div class="booking-info-wraper">
	<p id="booking_info_text"> </p>
	<p id="booking_price_text"> </p>
</div>
