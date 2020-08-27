<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">

		<title>Texas 2020 | Candidates Survey</title>
		<link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">
		<meta content="" name="descriptison">
		<meta content="" name="keywords">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

		<!-- Template Main CSS File -->
		<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/combined.css" rel="stylesheet">
	</head>

	<body>

		<section class="flex w100 auto_height flex_direction_column align_center">

			<div class="logo_section flex w100 justify_content_center align_center mb3rem pt2rem">
				<!-- <div class="auto_width flex justify_content_center"> -->
					<img id="step2Logo" src="<?php echo base_url() ?>assets/images/logo-texas-2020-voter-guide.png" alt="">
				<!-- </div> -->
			</div>

			<div class="flex w100 flex_direction_column align_center justify_content_center">
				<p class="thankyou_text text_center">THANK YOU</p>
				<img src="<?php echo base_url() ?>assets/images/thankyou_checkmark.png" class="checkmark_img" alt="">
				<p class="thankyou_text text_center">GOOD LUCK WITH YOUR CAMPAIGN</p>
			</div>

			<div class="flex w100 justify_content_center flex_direction_column mt1rem mrt0">
				<p class="verify_email_text text_center">We sent a verification link to confirm your email address.</p>
				<p class="verify_email_text text_center">Please <a href="javascript:void(0)" class="verify_emai_link">click verification email</a> to send your data to the survey.</p>
			</div>
			<br>
			<a class="resendVerification" style="color: white; cursor: pointer;text-decoration: underline;">Resend verification email</a><br>
			<p class="resendLink" style="color: white;font-size: 16px;padding:0;display:none">Your verification email has been resent. If it is not in your inbox, please check your SPAM/Junk folders.</p>

			<div class="flex w80p flex_direction_column mt1rem mrt0">
				<p class="sponsored_by_text text_center">Sponsored by:</p>
				<div class="flex align_center justify_content_center small_logos last_sponser_logos">
					<img class="mr2rem" src="<?php echo base_url() ?>assets/images/common_cause.png" alt="">
					<img class="ml2rem" src="<?php echo base_url() ?>assets/images/logo_us_texas.png" alt="">
				</div>
			</div>

		</section>

	</body>
	<script>
		var site_url = "<?php echo base_url() ?>";
		$(document).on('click', '.resendVerification', function(event) {
			$.ajax({
				url: site_url + 'candidate/resend/verification',
				type: 'GET',
				success:function(r){
					// alert("success")
					$('.resendLink').show();
				}
			})
		
			
		});
	</script>
</html>
