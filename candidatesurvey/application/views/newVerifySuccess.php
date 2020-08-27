<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">

		<title>Texas 2020 | Candidates Survey</title>
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

			<div class="flex w100 justify_content_center flex_direction_column mt1rem">
				<p class="verify_email_text text_center">Thank you for verifying your email address.</p>
				<p class="verify_email_text text_center">The Texas 2020 Voter Guide will be launched on August 1st, 2020.</p>
				<p class="verify_email_text text_center">If you have any questions or comments, please email survey@Texas2020.org.</p>
				<p class="verify_email_text text_center">Thank you again.</p>


				
			</div>
		
			
			<div class="flex w80p flex_direction_column mb4rem mt3rem">
				<p class="sponsored_by_text text_center">Sponsored by:</p>
				<div class="flex align_center justify_content_center small_logos">
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
				}
			})
		
			
		});
	</script>
</html>
