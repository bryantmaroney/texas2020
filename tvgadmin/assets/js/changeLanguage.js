 $(document).ready(function($) {
 	
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
	    		console.log(response)

	    		$('.form_head_tr').html(response.see_cand_dist);
	    		$('.submit_tr').val(response.submit);

	    		$('.compare_cand_head_title_1_tr').html(response.compare_candidate);
	    		$('.compare_cand_head_title_2_tr').html(response.leave_district);
	    		$('.comp_candidate_button_tr').html(response.compare_candidate_short)

	    		$('.usSenate_title_tr').html(response.uss);
	    		$('.usHouse_title_tr').html(response.us_house_res);
	    		$('.txHouse_title_tr').html(response.tx_house_res);
	    		$('.txSenate_title_tr').html(response.tx_state_senate);
	    		$('.district_not_up_for_tr').html(response.district_not_up_for);
	    		$('.district_tr').html(response.district);

	    		$('.about_us_tr').html(response.about_us);
	    		$('.disclaimer_tr').html(response.disclaimer);
	    		$('.contact_us_tr').html(response.contact_us);

	    		$('.election_reform_tr').html(response.elect_ref);


	    		$('.end_gerry_tr').html(response.end_gerry);
	    		$('.emp_small_tr').html(response.emp_small);
	    		$('.ran_choice_tr').html(response.ran_choice);
	    		$('.term_lim_tr').html(response.term_lim);
	    		$('.auto_vot_reg_tr').html(response.auto_vot_reg);
	    		$('.candidate_com_tr').html(response.candidate_com);

	    		$('.money_in_pol_tr').html(response.money_in_pol)

	    		$('.eli_loop_tr').html(response.eli_loop);
	    		$('.who_writes_our_laws_tr').html(response.who_writes_our_laws);
	    		$('.criminal_info_tr').html(response.criminal_info);
	    		$('.limit_lob_tr').html(response.limit_lob);
	    		$('.camp_fin_ref_tr').html(response.camp_fin_ref);
	    		$('.candidate_com_tr').html(response.candidate_com);

	    		$('.choose_tr').html(response.choose);
	    		$('.candidate_tr').html(response.candidate);


	    		$('.in_sp_of_tr').html(response.in_sp_of);
	    		$('.doesnt_support_tr').html(response.doesnt_support);
	    		$('.no_resp_tr').html(response.no_resp);

	    		$('.choice_modal_head_tr').html(response.choice_modal_head);
	    		$('.modal_usSenate_tr').html(response.modal_usSenate);
	    		$('.election_tr').html(response.election);
	    		$('.reform_tr').html(response.reform);
	    		$('.money_in_tr').html(response.money_in);	
	    		$('.politics_tr').html(response.money_in);
	    		$('.modal_usHouse_tr').html(response.modal_usHouse);
	    		$('.modal_txHouse_tr').html(response.modal_txHouse)
	    		$('.modal_txSenate_tr').html(response.modal_txSenate);
	    		$('.email_result_tr').html(response.email_result);
	    		$('.share_facebook_tr').html(response.share_facebook);












	    	}
	    })
	    
	  });
 });