<?php
	$dgc_calendar_color 			= get_option('dgc_booking_settings_calendar_color') ;
	$dgc_calendar_month_color 	= $dgc_calendar_color['dgc_calendar_month_color'] ;
	$booking_full_color 		= $dgc_calendar_color['booking_full_color'];
	$selected_date_color 		= $dgc_calendar_color['selected_date_color'];
	$booking_info_wraper_color 	= $dgc_calendar_color['booking_info_wraper_color'];
	$dgc_calendar_weekdays_color = $dgc_calendar_color['dgc_calendar_weekdays_color'];
	$dgc_calendar_days_color 	= $dgc_calendar_color['dgc_calendar_days_color'];
	$dgc_calendar_design=isset($dgc_calendar_color['dgc_calendar_design'])?$dgc_calendar_color['dgc_calendar_design']:'';

	if ( isset( $_POST['dgc_booking_settings_calendar_sumitted'] ) ) {
		$dgc_calendar_month_color 	= empty($_POST['dgc-calendar-month-color'])	 ? $dgc_calendar_month_color 	: $_POST['dgc-calendar-month-color'];
		$booking_full_color 		= empty($_POST['booking-full-color'])		 ? $booking_full_color			: $_POST['booking-full-color'];
		$selected_date_color 		= empty($_POST['selected-date-color'])		 ? $selected_date_color			: $_POST['selected-date-color'];
		$booking_info_wraper_color 	= empty($_POST['booking-info-wraper-color']) ? $booking_info_wraper_color	: $_POST['booking-info-wraper-color'];
		$dgc_calendar_weekdays_color = empty($_POST['dgc-calendar-weekdays-color'])? $dgc_calendar_weekdays_color	: $_POST['dgc-calendar-weekdays-color'];
		$dgc_calendar_days_color 	= empty($_POST['dgc-calendar-days-color'])	 ?$dgc_calendar_days_color 			: $_POST['dgc-calendar-days-color'];
		// error_log(print_r($_POST,1));
		$dgc_calendar_design 	= empty($_POST['calendar_designs'])	 ?$dgc_calendar_design 			: $_POST['calendar_designs'];
	}
	$calendar_color 	= array(
		'dgc_calendar_design'	=> $dgc_calendar_design,
		'dgc_calendar_month_color'	=> $dgc_calendar_month_color,
		'booking_full_color'		=> $booking_full_color,
		'selected_date_color'		=> $selected_date_color,
		'booking_info_wraper_color'	=> $booking_info_wraper_color,
		'dgc_calendar_weekdays_color'=> $dgc_calendar_weekdays_color,
		'dgc_calendar_days_color'	=> $dgc_calendar_days_color
	);
	update_option('dgc_booking_settings_calendar_color',$calendar_color);
	
?>
	<style type="text/css">
		.dgc_calendar_custom6 .dgc-calendar-month{
			background: <?php  echo $dgc_calendar_month_color ?> !important;
		}
		.dgc_calendar_custom6 .booking-full{
			background: <?php  echo $booking_full_color ?> !important;
		}
		.dgc_calendar_custom6 .timepicker-selected-date, .dgc_calendar_custom6 .selected-date{
			background: <?php  echo $selected_date_color ?> !important;
		}
		.dgc_calendar_custom6 .booking-info-wraper{
			background: <?php  echo $booking_info_wraper_color ?> !important;
		}
		.dgc_calendar_custom6 .dgc-calendar-weekdays{
			background: <?php  echo $dgc_calendar_weekdays_color ?> !important;
		}
		.dgc_calendar_custom6 .dgc-calendar-days{
			background: <?php  echo $dgc_calendar_days_color ?> !important;
		}
		.dgc_calendar_custom
		{

			border-radius: 5px ;
			padding: 2em !important;
			background-color: #1791ce !important;
			margin: 2em;
		}
		.dgc_calendar_custom6{
			background-color: transparent !important;
		}
		.dgc_calendar_custom1
		{
			background-color: #1791ce !important;
		}
		.dgc_calendar_custom2
		{
			background-color: #a5a5a5 !important
		}
		/*.dgc_calendar_custom3
		{
			background-color: #ff005e !important;
			background-image: linear-gradient(135deg, #f50246, #d86064,#e89195);
			background-image: linear-gradient(135deg, #362dc7, #00b8ff,#2f5bab);
			background-image: linear-gradient(135deg, #c72d2d, #131111cf,#1000fd);
			background-image: linear-gradient(135deg, #e4ff00, #5197a7,#00fd2b);
			background-image: radial-gradient(#271be0, #7725c1,#2700fd);
		}*/
		.dgc_calendar_custom3
		{
			background-color: #ff005e !important;
			background-image: linear-gradient(135deg, #362dc7, #00b8ff);
		}
		.dgc_calendar_custom4
		{
			background-color: #ff005e !important;
			background-image: linear-gradient(135deg, #f30a0a, #131111cf,#1000fd)
		}
		.dgc_calendar_custom5
		{
			background-color: #ff005e !important;
			background-image: radial-gradient(#271be0, #7725c1,#2700fd);
		}
		.booking-info-wraper{
			background: #ffffff !important
		}
		.dgc_calendar_custom1 .booking-full{
			background: #dadada  !important;
		}
		.dgc_calendar_custom1 .today{
			border: 1px solid #5ec1f3;
		}

		.booking-info-wraper{
			background: #ffffff !important;
		}
		.dgc_calendar_custom2 .booking-full{
			background: #dadada  !important;
		}
		.dgc_calendar_custom2 .today{
			border: 1px solid #ffebea;
		}

		

		.booking-info-wraper{
			background: #ffffff !important;  
		}
		.dgc_calendar_custom3 .booking-full{
			background: #8fa2f5  !important;
		}
		.dgc_calendar_custom3 .today{
			border: 1px solid #ffebea;
		}

		.booking-info-wraper{
			background: #ffffff !important; 
		}
		.dgc_calendar_custom4 .booking-full{
			background: #ff3406  !important;
		}
		.dgc_calendar_custom4 .today{
			border: 1px solid #ffebea;
		}

		.booking-info-wraper{
			background: #ffffff !important; 
		}
		.dgc_calendar_custom5 .booking-full{
			background: #a7a8ec  !important;
		}
		.dgc_calendar_custom5 .today{
			border: 1px solid #ffebea;
		}
		.dgc_calendar_custom6 .today{
			border: none !important;
			border-radius: 0px;
			color: black !important;
		}

		 .timepicker-selected-date, .selected-date,li.dgc-calendar-date:hover{
			background: #f4fafd !important;
    		color: #131515 !important;
    		border: 0px solid transparent;
		}
		li.dgc-calendar-date {
		    /*height: 35px;*/
		    padding-top: 4px;
		    padding-bottom: 6px;
		}
		.booking-wraper{
			float: left;
		}
		.choose_design{
			margin: 2em;
		}
		.booking-wraper {
			color: black;
		}
		.dgc_calendar_custom6 ul#dgc-calendar-days {
		    margin-left: 0px !important;
		}
		.dgc_calendar_custom6 .booking-info-wraper {
		     margin: 0em 0em; 
		     margin-top: 1em; 
		}
		.dgc_calendar_custom6  ul.dgc-calendar-weekdays {
			padding: 13px 0px;
    		margin-bottom: -13px;
		}
		.dgc_calendar_custom6  div#dgc-calendar-month-color {
			padding: 12px 8px;
		}
		.dgc-calendar-days,.dgc-calendar-weekdays{
			margin-top: 0px !important;
		}
		.dgc_calendar_custom6 .booking-info-wraper{
			border-radius: 0px;
		}
	</style>
	<?php

  	function dgc_generate_calendar_for_colorpicker( $start_date){
		$end_date		= strtotime( "+1 month", strtotime($start_date) );
		
		
		$day_order = array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
		$callender_days = '<div id="dgc-calendar-overlay" style="display:none"></div>';

		//Align date to print under corresponding week day name
		foreach ($day_order as $day) {
			if( $day == strtolower( date( "l", strtotime($start_date) ) ) ){
				break;
			}
			$callender_days .='<li class="dgc-calendar-date"></li>';
		}

		$curr_date	= strtotime($start_date);
		$i	= 1; $block_num = 1; $html_input_bock_no = '';
		while ($curr_date < $end_date) {
			$css_classes	= array("dgc-calendar-date");
			
			
			// if today.
			if( $curr_date == strtotime(date("Y-m-d") )	){
				$css_classes[] = 'today';
				
			}
			
			if( $curr_date == strtotime( "+1 day",strtotime(date('Y').'-'.date('m').'-01') )){
				$css_classes[] = 'booking-full';
				$css_classes[] = 'de-active';
				
			}
			if( $curr_date == strtotime( "+5 day",strtotime(date('Y').'-'.date('m').'-01') )){
				$css_classes[] = 'selected-date';
				
				
			}
			$css_classes = implode( ' ', array_unique($css_classes) );
			$callender_days .= '<li class="'.$css_classes.'"> '.$html_input_bock_no.date( "d", $curr_date ).'</li>';	
		
			$curr_date = strtotime( date ( "Y-m-d", strtotime( "+1 day", $curr_date ) ) );
			$i++;
		}
		return $callender_days;
	}
	?>
<div>
	<form method="POST">
		<div class="designs" style="display: inline-block;">
			<div class="booking-wraper " style="overflow:hidden;width:33%">
				<h4>
					<?php //echo _e('Click anywhere in the calendar to apply your desired colour.','bookings-and-appointments-for-woocommerce') ?>
				</h4>
				<div class="choose_design">
					<input id="calendar_design1" class="calendar_design1" name="calendar_designs" type="radio" <?php echo ($dgc_calendar_design==1 || empty($dgc_calendar_month_color))?"checked":"";?> value="1" >
					<label for="calendar_design1"><i><?php  echo __('Calendar Design 1(default)','bookings-and-appointments-for-woocommerce') ?></i></label>
				</div>
				<div class="dgc_calendar_custom dgc_calendar_custom1">
					 <div class="date-picker-wraper">
						<?php
							$timezone = get_option('timezone_string');
							if( empty($timezone) ){
								$time_offset = get_option('gmt_offset');
								$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
							}
							date_default_timezone_set($timezone);
							$start_date = date('Y').'-'.date('m').'-01';
						?>
						<div class="dgc-calendar-month"  id="dgc-calendar-month-color">	
							<ul>
								<li>
									<div class="month-year-wraper">
										<span class="span-month"><?php echo date_i18n( 'F', strtotime($start_date) );?></span>
										<span class="span-year"><?php echo date_i18n('Y', strtotime($start_date) );?></span>

									</div>
								</li>
							</ul>
						</div>

						<ul class="dgc-calendar-weekdays">
							<?php
							echo "<li>".__("Mo", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Tu", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("We", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Th", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Fr", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Sa", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Su", "bookings-and-appointments-for-woocommerce")."</li>";
							?>
						</ul>

						<ul class="dgc-calendar-days" id="dgc-calendar-days" style="position: relative;">
							<?php
								echo dgc_generate_calendar_for_colorpicker( $start_date );
							?>
						</ul>
					</div>
					<div class="booking-info-wraper"></div>
				</div>
			</div>

			<div class="booking-wraper " style="overflow:hidden;width:33%">
				<h4>
					<?php // echo _e('Click anywhere in the calendar to apply your desired colour.','bookings-and-appointments-for-woocommerce') ?>
				</h4>
				<div class="choose_design">
					<input id="calendar_design2" class="calendar_design2" name="calendar_designs" <?php echo ($dgc_calendar_design==2 || empty($dgc_calendar_design))?"checked":"";?> type="radio" value="2" >
					<label for="calendar_design2"><i><?php  echo __('Calendar Design 2','bookings-and-appointments-for-woocommerce') ?></i></label>
				</div>
				<div class="dgc_calendar_custom dgc_calendar_custom2">
					 <div class="date-picker-wraper">
						<?php
							$timezone = get_option('timezone_string');
							if( empty($timezone) ){
								$time_offset = get_option('gmt_offset');
								$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
							}
							date_default_timezone_set($timezone);
							$start_date = date('Y').'-'.date('m').'-01';
						?>
						<div class="dgc-calendar-month"  id="dgc-calendar-month-color">	
							<ul>
								<li>
									<div class="month-year-wraper">
										<span class="span-month"><?php echo date_i18n( 'F', strtotime($start_date) );?></span>
										<span class="span-year"><?php echo date_i18n('Y', strtotime($start_date) );?></span>

									</div>
								</li>
							</ul>
						</div>

						<ul class="dgc-calendar-weekdays">
							<?php
							echo "<li>".__("Mo", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Tu", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("We", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Th", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Fr", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Sa", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Su", "bookings-and-appointments-for-woocommerce")."</li>";
							?>
						</ul>

						<ul class="dgc-calendar-days" id="dgc-calendar-days" style="position: relative;">
							<?php
								echo dgc_generate_calendar_for_colorpicker( $start_date );
							?>
						</ul>
					</div>
					<div class="booking-info-wraper"></div>
				</div>
			</div>

			<div class="booking-wraper " style="overflow:hidden;width:33%">
				<h4>
					<?php // echo _e('Click anywhere in the calendar to apply your desired colour.','bookings-and-appointments-for-woocommerce') ?>
				</h4>
				<div class="choose_design">
					<input id="calendar_design3" class="calendar_design3" name="calendar_designs" <?php echo ($dgc_calendar_design==3 || empty($dgc_calendar_design))?"checked":"";?> type="radio" value="3" >
					<label for="calendar_design3"><i><?php  echo __('Calendar Design 3','bookings-and-appointments-for-woocommerce') ?></i></label>
				</div>
				<div class="dgc_calendar_custom dgc_calendar_custom3">
					 <div class="date-picker-wraper">
						<?php
							$timezone = get_option('timezone_string');
							if( empty($timezone) ){
								$time_offset = get_option('gmt_offset');
								$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
							}
							date_default_timezone_set($timezone);
							$start_date = date('Y').'-'.date('m').'-01';
						?>
						<div class="dgc-calendar-month"  id="dgc-calendar-month-color">	
							<ul>
								<li>
									<div class="month-year-wraper">
										<span class="span-month"><?php echo date_i18n( 'F', strtotime($start_date) );?></span>
										<span class="span-year"><?php echo date_i18n('Y', strtotime($start_date) );?></span>

									</div>
								</li>
							</ul>
						</div>

						<ul class="dgc-calendar-weekdays">
							<?php
							echo "<li>".__("Mo", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Tu", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("We", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Th", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Fr", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Sa", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Su", "bookings-and-appointments-for-woocommerce")."</li>";
							?>
						</ul>

						<ul class="dgc-calendar-days" id="dgc-calendar-days" style="position: relative;">
							<?php
								echo dgc_generate_calendar_for_colorpicker( $start_date );
							?>
						</ul>
					</div>
					<div class="booking-info-wraper"></div>
				</div>
			</div>

			<div class="booking-wraper " style="overflow:hidden;width:33%">
				<h4>
					<?php // echo _e('Click anywhere in the calendar to apply your desired colour.','bookings-and-appointments-for-woocommerce') ?>
				</h4>
				<div class="choose_design">
					<input id="calendar_design4" class="calendar_design4" name="calendar_designs" <?php echo ($dgc_calendar_design==4 || empty($dgc_calendar_design))?"checked":"";?> type="radio" value="4" >
					<label for="calendar_design4"><i><?php  echo __('Calendar Design 4','bookings-and-appointments-for-woocommerce') ?></i></label>
				</div>
				<div class="dgc_calendar_custom dgc_calendar_custom4">
					 <div class="date-picker-wraper">
						<?php
							$timezone = get_option('timezone_string');
							if( empty($timezone) ){
								$time_offset = get_option('gmt_offset');
								$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
							}
							date_default_timezone_set($timezone);
							$start_date = date('Y').'-'.date('m').'-01';
						?>
						<div class="dgc-calendar-month"  id="dgc-calendar-month-color">	
							<ul>
								<li>
									<div class="month-year-wraper">
										<span class="span-month"><?php echo date_i18n( 'F', strtotime($start_date) );?></span>
										<span class="span-year"><?php echo date_i18n('Y', strtotime($start_date) );?></span>

									</div>
								</li>
							</ul>
						</div>

						<ul class="dgc-calendar-weekdays">
							<?php
							echo "<li>".__("Mo", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Tu", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("We", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Th", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Fr", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Sa", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Su", "bookings-and-appointments-for-woocommerce")."</li>";
							?>
						</ul>

						<ul class="dgc-calendar-days" id="dgc-calendar-days" style="position: relative;">
							<?php
								echo dgc_generate_calendar_for_colorpicker( $start_date );
							?>
						</ul>
					</div>
					<div class="booking-info-wraper"></div>
				</div>
			</div>

			<div class="booking-wraper " style="overflow:hidden;width:33%">
				<h4>
					<?php // echo _e('Click anywhere in the calendar to apply your desired colour.','bookings-and-appointments-for-woocommerce') ?>
				</h4>
				<div class="choose_design">
					<input id="calendar_design5" class="calendar_design5" name="calendar_designs" <?php echo ($dgc_calendar_design==5 || empty($dgc_calendar_design))?"checked":"";?> type="radio" value="5" >
					<label for="calendar_design5"><i><?php  echo __('Calendar Design 5','bookings-and-appointments-for-woocommerce') ?></i></label>
				</div>
				<div class="dgc_calendar_custom dgc_calendar_custom5">
					 <div class="date-picker-wraper">
						<?php
							$timezone = get_option('timezone_string');
							if( empty($timezone) ){
								$time_offset = get_option('gmt_offset');
								$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
							}
							date_default_timezone_set($timezone);
							$start_date = date('Y').'-'.date('m').'-01';
						?>
						<div class="dgc-calendar-month"  id="dgc-calendar-month-color">	
							<ul>
								<li>
									<div class="month-year-wraper">
										<span class="span-month"><?php echo date_i18n( 'F', strtotime($start_date) );?></span>
										<span class="span-year"><?php echo date_i18n('Y', strtotime($start_date) );?></span>

									</div>
								</li>
							</ul>
						</div>

						<ul class="dgc-calendar-weekdays">
							<?php
							echo "<li>".__("Mo", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Tu", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("We", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Th", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Fr", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Sa", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Su", "bookings-and-appointments-for-woocommerce")."</li>";
							?>
						</ul>

						<ul class="dgc-calendar-days" id="dgc-calendar-days" style="position: relative;">
							<?php
								echo dgc_generate_calendar_for_colorpicker( $start_date );
							?>
						</ul>
					</div>
					<div class="booking-info-wraper"></div>
				</div>
			</div>

			<div class="booking-wraper " style="overflow:hidden;width:33%">
				<div class="choose_design">
					<input id="calendar_design6" class="calendar_design6" name="calendar_designs" <?php echo ($dgc_calendar_design==6 || empty($dgc_calendar_design))?"checked":"";?> type="radio" value="6" >
					<label for="calendar_design6"><i> <?php  echo __('Legacy Design','bookings-and-appointments-for-woocommerce') ?></i>(<?php echo _e('Click anywhere in the calendar to apply your desired colour.','bookings-and-appointments-for-woocommerce') ?>)</label>
				</div>
				<h4>
					<?php // echo _e('Click anywhere in the calendar to apply your desired colour.','bookings-and-appointments-for-woocommerce') ?>
				</h4>
				<div class="dgc_calendar_custom dgc_calendar_custom6" style="margin-top: -1.5em;padding: 0em !important;">
					 <div class="date-picker-wraper">
						<?php
							$timezone = get_option('timezone_string');
							if( empty($timezone) ){
								$time_offset = get_option('gmt_offset');
								$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
							}
							date_default_timezone_set($timezone);
							$start_date = date('Y').'-'.date('m').'-01';
						?>
						<input type="color" style="display:none" class="color-picker-input">
						<div class="dgc-calendar-month"  id="dgc-calendar-month-color">	
							<ul>
								<li>
									<div class="month-year-wraper">
										<span class="span-month"><?php echo date_i18n( 'F', strtotime($start_date) );?></span>
										<span class="span-year"><?php echo date_i18n('Y', strtotime($start_date) );?></span>

									</div>
								</li>
							</ul>
						</div>

						<ul class="dgc-calendar-weekdays">
							<?php
							echo "<li>".__("Mo", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Tu", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("We", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Th", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Fr", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Sa", "bookings-and-appointments-for-woocommerce")."</li>";
							echo "<li>".__("Su", "bookings-and-appointments-for-woocommerce")."</li>";
							?>
						</ul>

						<ul class="dgc-calendar-days" id="dgc-calendar-days" style="position: relative;">
							<?php
								echo dgc_generate_calendar_for_colorpicker( $start_date );
							?>
						</ul>
					</div>
					<div class="booking-info-wraper"></div>
				<input type="button" class="woocommerce-save-button" name="dgc_booking_settings_calendar_reset_color" id="dgc_reset_color" value="<?php _e('Reset to Default','bookings-and-appointments-for-woocommerce');?>" style="margin-top:1em;">
				</div>

			</div>
		</div>
		<div class="legacy_colors" style="float:left;">

			<input type="hidden" class="dgc-calendar-month-color" name="dgc-calendar-month-color">
			<input type="hidden" class="booking-full-color" name="booking-full-color" >
			<input type="hidden" class="selected-date-color" name="selected-date-color" >
			<input type="hidden" class="booking-info-wraper-color" name="booking-info-wraper-color" >
			<input type="hidden" class="dgc-calendar-weekdays-color" name="dgc-calendar-weekdays-color" >
			<input type="hidden" class="dgc-calendar-days-color" name="dgc-calendar-days-color" >
			<input type="submit" class="button-primary woocommerce-save-button" name="dgc_booking_settings_calendar_sumitted" value="<?php _e('Save Changes','bookings-and-appointments-for-woocommerce');?>">
		</div>

	</form>
</div>
	<script>
	jQuery(document).ready(function() {
		var className;
		var current_element;
		jQuery('.dgc_calendar_custom6 .dgc-calendar-month,.dgc_calendar_custom6 .booking-full,.dgc_calendar_custom6 .selected-date,.dgc_calendar_custom6 .booking-info-wraper,.dgc_calendar_custom6 .dgc-calendar-weekdays,.dgc_calendar_custom6 .dgc-calendar-days').on('click',function(e){
				classNames 	= this.className.split(/\s+/);
				var classes = ['selected-date','booking-full'];
		        className 	= jQuery.grep(classNames, function(c, i) {
		            return jQuery.inArray(c, classes) !== -1;
		        })[0];
		        className 	= (jQuery.type(className) === "undefined")?(classNames):className;
				color 		= rgb2hex(jQuery('.dgc_calendar_custom6').find('.'+className).css('background-color'));
				jQuery('.color-picker-input').attr('value',color);
				jQuery('.color-picker-input').click();
				// alert(className);
				current_element=this;
				e.stopPropagation();

			
		})
		jQuery('.color-picker-input').on('change',function(){
				var color = jQuery('.color-picker-input').val();
				// alert(color);
				jQuery('.'+className+'-color').val(color);
	
				jQuery('.dgc_calendar_custom6').find('.'+className).attr('style','background:'+color+' !important');
		})
		jQuery('#dgc_reset_color').on('click',function(){
			var default_color = {'dgc-calendar-month' : '#539bbe','booking-full' : '#dadada','selected-date': '#6aa3f1','booking-info-wraper' : '#539bbe','dgc-calendar-weekdays' 	: '#ddd','dgc-calendar-days' : '#eee'};
			jQuery.each(default_color,function(key,value){
				jQuery('.'+key+'-color').val(value);
				jQuery('.dgc_calendar_custom6').find('.'+key).attr('style','background-color:'+value+'!important');
				
			})
		})
	});

	function rgb2hex(rgb){
	 rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
	 return (rgb && rgb.length === 4) ? "#" +
	  ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
	  ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
	  ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
	}

	</script>
	
