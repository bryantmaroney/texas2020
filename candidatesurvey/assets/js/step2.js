$(document).ready(function($) {



	$('.first_name').keyup(function() {

		$('.last_name').removeAttr('readonly')

		$('.last_name').removeClass('disabled_input')

	})



	$('.last_name').keyup(function() {

		$('.offices div').css('cursor', 'pointer')

	})



	$('.offices div').click(function() {



		if (($('.first_name').val() == '' && $('.last_name').val() == '') || $('.last_name').val() == '') {

			return false

		}else {

			$('.offices div').removeClass('office_selected')

			$('.offices .officeOption').removeClass('officeOption_selected')



			$(this).addClass('office_selected')

			$(this).find('.officeOption').addClass('officeOption_selected')



			var selected_office_name = $(this).data('office')



			if (selected_office_name == 'U.S. Senate') {

				// $('.district_not_required_text').show()
				$('.which_district').attr('placeholder', 'District is not required');

				$('.which_district').val('')

				$('.which_district').addClass('disabled_input')

			}else {

				// $('.district_not_required_text').hide()
				$('.which_district').attr('placeholder', 'Enter District Number');

				$('.which_district').removeClass('disabled_input')

				$('.which_district').removeAttr('readonly')

			}

		}

	})



	Number.prototype.between = function(min, max){

		return this > min && this < max;

	}



	$('.which_district').keyup(function() {



		var selected_office_name = $('.offices div.office_selected').data('office')



		// Filter non-digits from input value.

		this.value = this.value.replace(/\D/g, '');



		if (this.value !== '') {



			var input_value = new Number(this.value)



			if (selected_office_name == 'us_house') {



				console.log(input_value)



				if (!input_value.between(0,37) && input_value !== 0) {

					this.value = 1

				}



			}else if (selected_office_name == 'tx_house') {



				if (!input_value.between(0,151) && input_value !== 0) {

					this.value = 1

				}



			}else if (selected_office_name == 'tx_senate') {



				if (!input_value.between(0,32) && input_value !== 0) {

					this.value = 1

				}

			}

		}

	})

	var validTxSenateDistricts = [1, 4, 6, 11, 12, 13, 18, 19, 20, 21, 22, 24, 26, 27, 28, 29];
	var districtError = false;
	$(document).on('input', '.which_district', function(){
		$('.districtWarning').remove();

		if( $('.office_selected').data('office') == "U.S. House" ){
			if( +$(this).val() < 1 || +$(this).val() > 36) {
				$('.enterDistrict').append('<p class="districtWarning" style="color:red;font-size: 14px;">Please enter the correct district number.</p>')
				districtError = true
			}
			else {
				$('.districtWarning').remove();
				districtError = false;
			}
		}
		else if( $('.office_selected').data('office') == "T.X. House" ) {
			if( +$(this).val() < 1 || +$(this).val() > 150) {
				$('.enterDistrict').append('<p class="districtWarning" style="color:red;font-size: 14px;">Please enter the correct district number.</p>')
				districtError = true
			}
			else {
				$('.districtWarning').remove();
				districtError = false;
			}
		}
		else if( $('.office_selected').data('office') == "T.X. Senate" ) {
			if( !validTxSenateDistricts.includes(+$(this).val()) ) {
				$('.enterDistrict').append('<p class="districtWarning" style="color:red;font-size: 14px;">Please enter the correct district number.</p>')
				districtError = true
			}
			else {
				$('.districtWarning').remove();
				districtError = false;
			}
		}
	})



	$('.step1_sbm_btn').click(function(){



		var all_page_data = {}



		all_page_data.first_name = $('.first_name').val()

		all_page_data.last_name = $('.last_name').val()

		all_page_data.selected_office = $('.offices div.office_selected').data('office')



		if (all_page_data.selected_office == 'U.S. Senate' && all_page_data.first_name != '' && all_page_data.last_name != '' && all_page_data.selected_office !='') {

			all_page_data.which_district = ''
				sendSaveRequest(all_page_data)


		}else if(all_page_data.selected_office != 'U.S. Senate' && all_page_data.first_name != '' && all_page_data.last_name != '' && all_page_data.selected_office !=''){

			all_page_data.which_district = $('.which_district').val();
			
			if (all_page_data.which_district != '') {

				sendSaveRequest(all_page_data)
			}
			else {
				$('#step2Validation').fadeIn(300);
			}
		}
		else {
			$('#step2Validation').fadeIn(300);
		}






	})

	function sendSaveRequest(all_page_data) {

		if(!districtError){
			$.ajax({
				url: site_url + 'step2/save',
				type: 'POST',
				data: all_page_data,
				success:function(r){
					window.location.href = site_url + 'step3';
				}
			})
		}

		
		

	}

	$(document).on('click', '.close_mannual_modal', function(event) {
		$(this).parents('.modalManually').fadeOut(300);
	});



})

