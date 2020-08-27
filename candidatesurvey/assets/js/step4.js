$(document).ready(function($) {
	// $(document).on('click', '.ev_sbm_btn', function(event) {
	// 	_this = $(this);
	// 	$.ajax({
	// 		url: site_url + 'candidate/verification',
	// 		type: 'POST',
	// 		data: {email: $('.enter_email_addr_inp').val()},
	// 		success:function(r){
	// 			window.location.href = site_url + "step5";
	// 		}
	// 	})
		
		
	// });
	$(".ev_sbm_btn").one("click", function(){
		_this = $(this);
		$.ajax({
			url: site_url + 'candidate/verification',
			type: 'POST',
			data: {email: $('.enter_email_addr_inp').val()},
			success:function(r){
				window.location.href = site_url + "step5";
			}
		})
	});
});