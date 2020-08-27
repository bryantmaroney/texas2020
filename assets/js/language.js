 jQuery(document).ready(function($) {
 	
	 $(document).on('change', '.changeLanguage', function(event) {

	    if($(this).val() == "english") {
	      $(this).val('spanish')
	    }
	    else {
	      $(this).val('english')
	    }

	    $.ajax({
	    	url: site_url + 'change/language',
	    	type: 'POST',
	    	dataType: 'json',
	    	data: {language: $(this).val()},
	    	success:function(response) {
	    		
	    	$('.sponsred_by').html(response.sponsred_by);

                $('.is_not_too_late').html(response.is_not_too_late);
                
                $('.fix_texas').html(response.fix_texas);
                
                $('.solution_10').html(response.solution_10);
                
                $('.reminder').html(response.reminder);
                
                $('.remind_me').html(response.remind_me);

                $('.enter_your_email').attr('placeholder', response.enter_your_email);
                
                $('.learn_more').html(response.learn_more);
                
                $('.connect_us').html(response.connect_us);
                
                $('.parall1text1').html(response.parall1text1);
                $('.parall1text2').html(response.parall1text2);
                $('.parall1text3').html(response.parall1text3);
                $('.parall1text4').html(response.parall1text4);
                $('.parall1text4').html(response.parall1text5);
                $('.parall2text1').html(response.parall2text1);
                $('.parall2text2').html(response.parall2text2);
                $('.parall2text3').html(response.parall2text3);
                $('.parall2text4').html(response.parall2text4);
                $('.parall2text5').html(response.parall2text5);
                $('.parall2text6').html(response.parall2text6);
                $('.parall2text7').html(response.parall2text7);
                $('.parall3text1').html(response.parall3text1);
                $('.parall3text2').html(response.parall3text2);
                $('.parall3text3').html(response.parall3text3);
                $('.parall3text4').html(response.parall3text4);
                $('.parall3text5').html(response.parall3text5);
                $('.parall3text6').html(response.parall3text6);
                $('.parall3text7').html(response.parall3text7);
                $('.parall3text8').html(response.parall3text8);
                $('.parall3text9').html(response.parall3text9);
                $('.parall3text10').html(response.parall3text10);
                $('.learn10_problems').html(response.learn10_problems);
                $('.problem1').html(response.problem1);
                $('.problem2').html(response.problem2);
                $('.problem3').html(response.problem3);
                $('.problem4').html(response.problem4);
                $('.problem5').html(response.problem5);
                $('.problem6').html(response.problem6);
                $('.problem7').html(response.problem7);
                $('.problem8').html(response.problem8);
                $('.problem9').html(response.problem9);
                $('.problem10').html(response.problem10);
                $('.pr1_front_text1').html(response.pr1_front_text1);
                $('.pr1_front_text2').html(response.pr1_front_text2);
                $('.pr1_front_text3').html(response.pr1_front_text3);
                $('.pr1_front_text4').html(response.pr1_front_text4);
                $('.pr1_front_text5').html(response.pr1_front_text5);
                $('.pr1_back_text1').html(response.pr1_back_text1);
                $('.pr1_back_text2').html(response.pr1_back_text2);
                $('.pr1_back_text3').html(response.pr1_back_text3);
                $('.pr1_back_text4').html(response.pr1_back_text4);
                $('.pr1_back_text5').html(response.pr1_back_text5);
                $('.pr2_front_text1').html(response.pr2_front_text1);
                $('.pr2_front_text2').html(response.pr2_front_text2);
                $('.pr2_front_text3').html(response.pr2_front_text3);
                $('.pr2_front_text4').html(response.pr2_front_text4);
                $('.pr2_front_text5').html(response.pr2_front_text5);
                $('.pr2_front_text6').html(response.pr2_front_text6);
                $('.pr2_front_text7').html(response.pr2_front_text7);
                $('.pr2_back_text1').html(response.pr2_back_text1);
                $('.pr2_back_text2').html(response.pr2_back_text2);
                $('.pr2_back_text3').html(response.pr2_back_text3);
                $('.pr2_back_text4').html(response.pr2_back_text4);
                $('.pr2_back_text5').html(response.pr2_back_text5);
                $('.pr2_back_text6').html(response.pr2_back_text6);
                $('.pr3_front_text1').html(response.pr3_front_text1);
                $('.pr3_front_text2').html(response.pr3_front_text2);
                $('.pr3_front_text3').html(response.pr3_front_text3);
                $('.pr3_front_text4').html(response.pr3_front_text4);
                $('.pr3_back_text1').html(response.pr3_back_text1);
                $('.pr3_back_text2').html(response.pr3_back_text2);
                $('.pr3_back_text3').html(response.pr3_back_text3);
                $('.pr3_back_text4').html(response.pr3_back_text4);
                $('.pr3_back_text5').html(response.pr3_back_text5);
                $('.pr4_front_text1').html(response.pr4_front_text1);
                $('.pr4_front_text2').html(response.pr4_front_text2);
                $('.pr4_front_text3').html(response.pr4_front_text3);
                $('.pr4_front_text4').html(response.pr4_front_text4);
                $('.pr4_back_text1').html(response.pr4_back_text1);
                $('.pr4_back_text2').html(response.pr4_back_text2);
                $('.pr4_back_text3').html(response.pr4_back_text3);
                $('.pr4_back_text4').html(response.pr4_back_text4);
                $('.pr4_back_text5').html(response.pr4_back_text5);
                $('.pr5_front_text1').html(response.pr5_front_text1);
                $('.pr5_front_text2').html(response.pr5_front_text2);
                $('.pr5_front_text3').html(response.pr5_front_text3);
                $('.pr5_front_text4').html(response.pr5_front_text4);
                $('.pr5_front_text5').html(response.pr5_front_text5);
                $('.pr5_front_text6').html(response.pr5_front_text6);
                $('.pr5_back_text1').html(response.pr5_back_text1);
                $('.pr5_back_text2').html(response.pr5_back_text2);
                $('.pr5_back_text3').html(response.pr5_back_text3);
                $('.pr5_back_text4').html(response.pr5_back_text4);
                $('.pr5_back_text5').html(response.pr5_back_text5);
                $('.pr6_front_text1').html(response.pr6_front_text1);
                $('.pr6_front_text2').html(response.pr6_front_text2);
                $('.pr6_front_text3').html(response.pr6_front_text3);
                $('.pr6_back_text1').html(response.pr6_back_text1);
                $('.pr6_back_text2').html(response.pr6_back_text2);
                $('.pr6_back_text3').html(response.pr6_back_text3);
                $('.pr6_back_text4').html(response.pr6_back_text4);
                $('.pr6_back_text5').html(response.pr6_back_text5);
                $('.pr7_front_text1').html(response.pr7_front_text1);
                $('.pr7_front_text2').html(response.pr7_front_text2);
                $('.pr7_front_text3').html(response.pr7_front_text3);
                $('.pr7_back_text1').html(response.pr7_back_text1);
                $('.pr7_back_text2').html(response.pr7_back_text2);
                $('.pr7_back_text3').html(response.pr7_back_text3);
                $('.pr7_back_text4').html(response.pr7_back_text4);
                $('.pr7_back_text5').html(response.pr7_back_text5);
                $('.pr8_front_text1').html(response.pr8_front_text1);
                $('.pr8_front_text2').html(response.pr8_front_text2);
                $('.pr8_front_text3').html(response.pr8_front_text3);
                $('.pr8_front_text4').html(response.pr8_front_text4);
                $('.pr8_front_text5').html(response.pr8_front_text5);
                $('.pr8_back_text1').html(response.pr8_back_text1);
                $('.pr8_back_text2').html(response.pr8_back_text2);
                $('.pr8_back_text3').html(response.pr8_back_text3);
                $('.pr8_back_text4').html(response.pr8_back_text4);
                $('.pr8_back_text5').html(response.pr8_back_text5);
                $('.pr9_front_text1').html(response.pr9_front_text1);
                $('.pr9_front_text2').html(response.pr9_front_text2);
                $('.pr9_front_text3').html(response.pr9_front_text3);
                $('.pr9_front_text4').html(response.pr9_front_text4);
                $('.pr9_front_text5').html(response.pr9_front_text5);
                $('.pr9_front_text6').html(response.pr9_front_text6);
                $('.pr9_back_text1').html(response.pr9_back_text1);
                $('.pr9_back_text2').html(response.pr9_back_text2);
                $('.pr9_back_text3').html(response.pr9_back_text3);
                $('.pr9_back_text4').html(response.pr9_back_text4);
                $('.pr9_back_text5').html(response.pr9_back_text5);
                $('.pr10_front_text1').html(response.pr10_front_text1);
                $('.pr10_front_text2').html(response.pr10_front_text2);
                $('.pr10_front_text3').html(response.pr10_front_text3);
                $('.pr10_front_text4').html(response.pr10_front_text4);
                $('.pr10_back_text1').html(response.pr10_back_text1);
                $('.pr10_back_text2').html(response.pr10_back_text2);
                $('.pr10_back_text3').html(response.pr10_back_text3);
                $('.pr10_back_text4').html(response.pr10_back_text4);
                $('.pr10_back_text5').html(response.pr10_back_text5);
                $('.pr10_back_text6').html(response.pr10_back_text6);
                $('.your_district').html(response.your_district);
                $('.sidtr_sec_text1').html(response.sidtr_sec_text1);
                $('.sidtr_sec_text2').html(response.sidtr_sec_text2);
                $('.sidtr_sec_text3').html(response.sidtr_sec_text3);
                $('.sidtr_sec_text4').html(response.sidtr_sec_text4);
                $('.sidtr_sec_text5').html(response.sidtr_sec_text5);
                $('.sidtr_sec_text6').html(response.sidtr_sec_text6);
                $('.sidtr_sec_text7').html(response.sidtr_sec_text7);
                $('.sidtr_sec_text8').html(response.sidtr_sec_text8);
                $('.sidtr_sec_text9').html(response.sidtr_sec_text9);
                $('.sidtr_sec_text10').html(response.sidtr_sec_text10);
                $('.sidtr_sec_text11').html(response.sidtr_sec_text11);
                $('.sidtr_sec_text12').html(response.sidtr_sec_text12);
                
                $('.learn').html(response.learn);
                $('.your').html(response.your);
                $('.districts_tr').html(response.districts_tr);
                $('.email_address').html(response.email_address);
                $('.street_address').html(response.street_address);
                $('.city').html(response.city);
                $('.zip').html(response.zip);
                $('.go').html(response.go);
                $('.districts_for').html(response.districts_for);
                $('.us_senate').html(response.us_senate);
                $('.us_house').html(response.us_house);
                $('.tx_house').html(response.tx_house);
                $('.tx_senate').html(response.tx_senate);
                $('.we_must_be_informed').html(response.we_must_be_informed);
                $('.informed_bottom_text1').html(response.informed_bottom_text1);
                $('.informed_bottom_text2').html(response.informed_bottom_text2);
                $('.informed_bottom_text3').html(response.informed_bottom_text3);
                $('.informed_bottom_text4').html(response.informed_bottom_text4);
                
                $('.august_text1').html(response.august_text1);
                $('.august_text2').html(response.august_text2);
                $('.august_text3').html(response.august_text3);
                $('.august_text4').html(response.august_text4);
                $('.august_text5').html(response.august_text5);
                $('.august_text6').html(response.august_text6);
                $('.august_text7').html(response.august_text7);
                $('.august_hidden_text1').html(response.august_hidden_text1);
                $('.august_hidden_text2').html(response.august_hidden_text2);
                $('.august_hidden_text3').html(response.august_hidden_text3);
                $('.august_hidden_text4').html(response.august_hidden_text4);
                $('.august_hidden_text5').html(response.august_hidden_text5);
                $('.august_hidden_text6').html(response.august_hidden_text6);
                $('.help_us').html(response.help_us);
                $('.get_reminder').html(response.get_reminder);
                $('.signup').html(response.signup);
                $('.copyright').html(response.copyright);
	    	}
	    })
	  });
 });