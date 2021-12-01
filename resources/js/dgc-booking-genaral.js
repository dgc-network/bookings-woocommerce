jQuery(document).ready(function($) {
	const full_month = ["January", "February", "March", "April", "May", "June",
		  "July", "August", "September", "October", "November", "December"
		];
	/********* html-dgc-booking-add-to-cart.php *********/
	
	$(".single_add_to_cart_button").click(function(e){
		if( $(this).hasClass("disabled") ){
			e.preventDefault();
			$(this).removeClass('loading');
		}
		
		if( $(".dgc-date-from").val() == '' && $(".dgc-date-to").val() == ''){
			$(".callender-error-msg").html( dgc_booking_locale.pick_booking ).focus();
			e.preventDefault();
			$(this).removeClass('loading');
		}
	})


	/*********** Booking Calendar ************/

	$(document).on("click", ".non-bookable-slot", function(){
		if( $(this).hasClass('de-active') ){
			loop_elm = $(this)
		}else{
			loop_elm 	= $(this).nextAll(".de-active:first");
		}
		show_not_bookable_message( loop_elm );
	})

	//If change here change in same function coded in includes->booking-callender->html-dgc-booking-datepicker.php
	function show_not_bookable_message(loop_elm){ 
		if( loop_elm.length == 0 ){ //case of last item or no de-active after curent elm.
			return;
		}
		
		from 			= loop_elm.find(".callender-full-date").val();
		from_date_obj 	= new Date(from);
		from_date 		= from_date_obj.getUTCDate();
		month 			= dgc_booking_locale.months[from_date_obj.getUTCMonth()]
		
		msg_html = "";
		while( loop_elm.length > 0 ){
			to 			= $(loop_elm).find(".callender-full-date").val();
			to_date_obj = new Date(to);
			to_date 	= to_date_obj.getUTCDate();
			month 		=  dgc_booking_locale.months[to_date_obj.getUTCMonth()]

			date_text = ( from.length == 7 ) ? '' : to_date; //in case of month callender, no need to show date
			
			if( msg_html.length > 0 ){
				msg_html = msg_html.replace(" and", ", ");
				msg_html += " and <b>"+month+" "+date_text+"</b>";
			}else{
				msg_html = "<b>"+month+" "+date_text+"</b>";
			}

			loop_elm = loop_elm.next(".de-active");
		}
		
		if( from_date == to_date ){
			msg_html = "<b>"+month+" "+from_date+"</b> "+dgc_booking_locale.is_not_avail;
		}else{
			msg_html += " "+dgc_booking_locale.are_not_avail;
		}

		$('.booking-info-wraper').html('<p id="booking_info_text"><span class="not-available-msg">'+msg_html+'</span></p>');
	}


	date_from = '';
	date_to = '';
	click = 0;

	$.fn.isAfter = function(sel){
		return this.prevAll(sel).length !== 0;
	}
	$.fn.isBefore= function(sel){
		return this.nextAll(sel).length !== 0;
	}

	function resetSelection(){
		date_from = '';
		date_to = '';
		click = 0;

		$(".selected-date").each(function(){
			$(this).removeClass("selected-date");
			$(".dgc-date-from").val("");
			$(".dgc-date-to").val("");
		});
		$("#booking-info-wraper").html("");

		$(".single_add_to_cart_button").addClass("disabled");
	}
	
	/******** Date Picker *********/

	//Callender date picker
	$(".date-picker-wraper").on("click", ".dgc-calendar-date", function(){
		$(".callender-error-msg").html("&nbsp;");
		//if click on already booked or past date
		if( $(this).hasClass("de-active") || $(this).hasClass("past-time") ){
			return
		}
		$(".single_add_to_cart_button").removeClass("disabled");
		
		//if Fixed range, don't allow to choose second date
		if( $("#book_interval_type").val() == 'fixed' ){
			resetSelection();
			$(this).addClass("selected-date");
			book_to = $(this);
			for (var i = $("#book_interval").val(); i > 1; i--) {
				book_to = book_to.next().addClass("selected-date");
				if( book_to.hasClass('de-active') ){
					resetSelection();
					return;
				}
			};

			date_from 	= $(this).find(".callender-full-date").val();
			date_to 	= book_to.find(".callender-full-date").val();
			$(".dgc-date-from").val(date_from);
			$(".dgc-date-to").val(date_to).change();
			return;
		}

		//if date_from and date_to set, reset all for third click
		if( date_from!='' && date_to!="" ){
			resetSelection();
			$(this).trigger('click');
			return;
		}

		click++;

		
		//if selected a date_to, which is past to date_from
		if( date_from !='' && date_to=='' && $(this).isBefore( ".selected-date" ) ){
			$('.booking-info-wraper').html('<p id="booking_info_text"><span class="not-available-msg">'+dgc_booking_locale.pick_later_date+'</span></p>');
			resetSelection();
			return;
		}

		//if click for FROM date
		if( date_from == "" || click%2 != 0 || $("#book_interval_type").val() != 'customer_choosen' ){
			date_from = $(this).find(".callender-full-date").val();
			$(".dgc-date-from").val(date_from);
			$(".dgc-date-to").val(date_from).change();
			$(this).addClass("selected-date");
		}
		//click for TO date
		else{
			el = $("input[value='"+date_from+"']").closest("li");
			if( !el.length ){
				el = $( "li.dgc-calendar-date" ).first();
			}

			//loop untill next clicked date or deactived date found. 
			while(el){
				if( !el.hasClass("de-active") ) { 
					el.addClass("selected-date")
				}

				if( el.hasClass("de-active") ){
					resetSelection();
					show_not_bookable_message(el);
					return;
				}
				else if( this === el.get(0) ){
					date_to = el.find(".callender-full-date").val();
					el = false;
				}else{
					el = el.next();
				}
			}
			$(".dgc-date-to").val( date_to ).change(); //trigger .dgc-date-to for update the price
		}
	});

	$(".date-picker-wraper, .time-picker-wraper").on("click", ".dgc-next", function(){
		product_id = jQuery( "#dgc_product_id" ).val();
		month = jQuery( ".callender-month" ).val();
		year = jQuery( ".callender-year" ).val();
		calender_type= jQuery("#calender_type").val();
		if(calender_type=='time'){
			calendar_for='time-picker';
			loding_ico_url = $("#plugin_dir_url").val()+ "includes/booking-callender/icons/loading.gif";
			$("#dgc-calendar-time").html('<img class="loading-ico" align="middle" src="'+loding_ico_url+'">');
		}
		else{
			calendar_for='date-picker';
		}
		if( $("#book_interval_type").val() == 'fixed' ){
			resetSelection();
		}
		var data = {
			action: 'dgc_get_callender_next_month',
			// security : dgc_booking_locale.security,
			product_id: product_id,
			month: month,
			year: year,
			calendar_for:calendar_for,
		};
		$("#dgc-calendar-overlay").show();
		$.post( dgc_booking_locale.ajaxurl, data, function(res) {
			$("#dgc-calendar-overlay").hide();
			if(calender_type=='time'){
				$("#dgc-calendar-time").html( '<center>'+dgc_booking_locale.Please_Pick_a_Date+'</center>');
			}
			result = jQuery.parseJSON(res);
			$("#dgc-calendar-days").html(result.days);
			jQuery( ".callender-month" ).val(result.month)
			jQuery( ".callender-year" ).val(result.year)

			jQuery( ".span-month" ).html( dgc_booking_locale.months[full_month.indexOf(result.month)] )
			jQuery( ".span-year" ).html(result.year);

			if( !$(".dgc-date-from").val() ){
				$(".single_add_to_cart_button").addClass("disabled");
			}
		});
	})
	
	$(".date-picker-wraper, .time-picker-wraper").on("click", ".dgc-prev", function(){
		
		resetSelection() // The plugin is not supports to select backward.

		product_id = jQuery( "#dgc_product_id" ).val();
		month = jQuery( ".callender-month" ).val();
		year = jQuery( ".callender-year" ).val();
		calender_type= jQuery("#calender_type").val();
		if(calender_type=='time'){
			calendar_for='time-picker';
			loding_ico_url = $("#plugin_dir_url").val()+ "includes/booking-callender/icons/loading.gif";
			$("#dgc-calendar-time").html('<img class="loading-ico" align="middle" src="'+loding_ico_url+'">');
		}
		else{
			calendar_for='date-picker';
		}
		var data = {
			action: 'dgc_get_callender_prev_month',
			// security : dgc_booking_locale.security,
			product_id: product_id,
			month: month,
			year: year,
			calendar_for:calendar_for,
		};
		$("#dgc-calendar-overlay").show();
		$.post( dgc_booking_locale.ajaxurl, data, function(res) {
			$("#dgc-calendar-overlay").hide();
			if(calender_type=='time'){
				$("#dgc-calendar-time").html( '<center>'+dgc_booking_locale.Please_Pick_a_Date+'</center>');
			}
			result = jQuery.parseJSON(res);
			
			$("#dgc-calendar-days").html(result.days);
			
			jQuery( ".callender-month" ).val(result.month)
			jQuery( ".callender-year" ).val(result.year)

			jQuery( ".span-month" ).html( dgc_booking_locale.months[full_month.indexOf(result.month)] )
			jQuery( ".span-year" ).html(result.year)
		});
	})



	/******* Month Picker *********/

	$(".month-picker-wraper").on("click", ".dgc-calendar-date", function(){
		//if click on already booked of past date
		if( $(this).hasClass("de-active") || $(this).hasClass("past-time") ){
			return
		}

		resetSelection()
		$(this).addClass("selected-date");
		date_from 	= $(this).find(".callender-full-date").val();
		
		//if Fixed range, don't allow to choose second date
		if( $("#book_interval_type").val() == 'fixed' ){
			book_to = $(this);
			for (var i = $("#book_interval").val(); i > 1; i--) {
				book_to = book_to.next().addClass("selected-date");
				if( book_to.hasClass('de-active') ){
					resetSelection();
					return;
				}
			};
		}
		date_to = $(".selected-date").last().find(".callender-full-date").val();

		$(".dgc-date-from").val(date_from);
		$(".dgc-date-to").val(date_to).change();

	});


	/******** Time Picker *********/

	//Callender date picker
	$(".time-picker-wraper  #dgc-calendar-days").on("click", ".dgc-calendar-date", function(){
		//if click on already booked of past date
		if( $(this).hasClass("de-active") || $(this).hasClass("past-time") ){
			return
		}
		$('.dgc-calendar-date').removeClass("timepicker-selected-date");
		resetSelection();
		$(this).addClass("timepicker-selected-date");
		$('.booking-info-wraper').html('');
		return;
		

	});
	$(".time-picker-wraper #dgc-calendar-time").on("click", ".dgc-calendar-date", function(){
			//if click on already booked of past date
			if( $(this).hasClass("de-active") || $(this).hasClass("past-time") ){
				return
			}
			resetSelection();
			
			date_from 	= $(this).find(".callender-full-date").val();
			date_to 	= $(this).find(".callender-full-date").val();
			$(".dgc-date-from").val(date_from);
			$(this).addClass("selected-date");
			$(".dgc-date-to").val(date_to).change();

		});


	$(document).on('mouseover','.dgc-calendar-date',function(ev){
		// alert($(ev.target).find('.callender-full-date').val());
		calender_type=$('#book_interval_type').val();
		// alert(click);
		if(calender_type=='fixed')
			return true;
		from=$('.dgc-date-from').val();
		$( ".dgc-calendar-days li").removeClass('mouse_hover');
		$( ".dgc-calendar-days li").removeClass('mouse_hover_past');
		if(from!='' && click!=2)
		{ 
			// alert($( ".dgc-calendar-days  li" ).index( this ));
			first=$( ".dgc-calendar-days .selected-date" ).first();
			first_index=$( ".dgc-calendar-days li").index( first );
			current_index=$( ".dgc-calendar-days  li" ).index( this );
			// alert($( ".dgc-calendar-days li").index( first ));
			if(first_index!=-1 && parseInt(first_index)<parseInt(current_index)) // for next days
			{
				// next=$( ".dgc-calendar-days .selected-date:eq( "+(parseInt(first_index)+1)+" )" );
				next=$(first).next();
				next_index=$( ".dgc-calendar-days li").index( next );
				$(next).addClass("mouse_hover");
				while(parseInt(next_index)!=-1 && parseInt(next_index)<parseInt(current_index))
				{	
					next=$(next).next();
					next_index=$( ".dgc-calendar-days li").index( next );
					if($(next).hasClass('de-active') || $(next).hasClass('not-available'))
						break;
					$(next).addClass("mouse_hover");
				}
			}
			else if(first_index!=-1 && parseInt(first_index)>parseInt(current_index)) // if hovering past days
			{
				if(!$(this).hasClass('selected-date'))
					$(this).addClass("mouse_hover_past");
				last=$( ".dgc-calendar-days li" ).last();
				last_index=$( ".dgc-calendar-days li").index( last );
				next=$(first).next();
				next_index=$( ".dgc-calendar-days li").index( next );
				while(parseInt(next_index)!=-1 && parseInt(next_index)<parseInt(last_index))
				{
					$(next).addClass("mouse_hover");	
					next=$(next).next();
					next_index=$( ".dgc-calendar-days li").index( next );
					if($(next).hasClass('de-active') || $(next).hasClass('not-available'))
						break;
					$(next).addClass("mouse_hover");
				}
			}
			
		}
		
	});
	$(document).on('click','.dgc-calendar-date',function(){
		$( ".dgc-calendar-days li").removeClass('mouse_hover');
		$( ".dgc-calendar-days li").removeClass('mouse_hover_past');

	});
	$(document).on('mouseleave','.dgc-calendar-date',function(){
		$( ".dgc-calendar-days li").removeClass('mouse_hover');
		$( ".dgc-calendar-days li").removeClass('mouse_hover_past');

	});


});