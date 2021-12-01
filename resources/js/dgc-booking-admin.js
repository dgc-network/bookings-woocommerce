jQuery(document).ready(function($) {
	function toggleInterval(){
		jQuery( '._tax_status_field' ).closest( '.show_if_simple' ).addClass( 'show_if_dgc_booking' ).show();
		if( $("#_dgc_book_interval_type").val() != 'fixed' && $("#_dgc_book_interval_period").val() != 'minute' && $("#_dgc_book_interval_period").val() != 'hour'){
			$("#_dgc_book_interval").hide();
		}else{
			$("#_dgc_book_interval").show();
		}
	}
	function toggleWorkingTime(){
		if( $("#_dgc_book_interval_period").val() == 'minute' || $("#_dgc_book_interval_period").val() == 'hour' ){
			$("._dgc_book_working_hour_start_field").show();
			$("._dgc_book_working_hour_end_field").show();
		}else{
			$("._dgc_book_working_hour_start_field").hide();
			$("._dgc_book_working_hour_end_field").hide();
		}
	}
	function toggleNonWorkingHours(){
		if( $("#_dgc_book_interval_period").val() == 'minute' || $("#_dgc_book_interval_period").val() == 'hour' ){
			$(".non-working-hours").show();
			$(".non-working-hours").show();
		}else{
			$(".non-working-hours").hide();
			$(".non-working-hours").hide();
		}
	}
	function toggleCallender(){
		if( $("#_dgc_book_interval_type").val()=='customer_choosen' ){
			$("#_dgc_book_interval_period").val("day").change();
			$("#_dgc_book_interval").val(1).change();
			$("#_dgc_book_interval_period").hide();
		}else{
			$("#_dgc_book_interval_period").show();
		}
	}
	toggleInterval();
	toggleWorkingTime();
	toggleCallender();
	toggleNonWorkingHours()
	$("#_dgc_book_interval_type").change(function(){
		toggleCallender()
		toggleInterval();
	});

	$("#_dgc_book_interval_period").change(function(){
		toggleInterval()
		toggleWorkingTime();

		toggleNonWorkingHours();
	})
})