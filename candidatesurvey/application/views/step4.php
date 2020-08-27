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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Template Main CSS File -->
		<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/combined.css" rel="stylesheet">
	</head>

	<body>

		<section class="flex w100 auto_height flex_direction_column align_center">

			<div class="logo_section flex w100 justify_content_center align_center mb2rem pt2rem">
				<!-- <div class="auto_width flex justify_content_center"> -->
					<img id="step2Logo" src="<?php echo base_url() ?>assets/images/logo-texas-2020-voter-guide.png" alt="">
				<!-- </div> -->
			</div>

			<div class="flex w80p justify_content_center mt2rem mb3rem flex_direction_column">
				<p class="text_center thankyou_title">Thank you for taking our survey!</p>

				<p class="text_center verify_text mt2rem red_color">Please Verify Your Email</p>
				<p class="text_center verify_text">Address To Submit</p>
			</div>

			<div class="flex w100 justify_content_center align_center mb2rem">
				<input type="email" class="enter_email_addr_inp" autocomplete="off" placeholder="ENTER EMAIL ADDRESS">
			</div>

			<div class="flex w100 justify_content_center align_center">
				<button type="button" class="btn_stlye mb4rem ev_sbm_btn">Submit</button>
			</div>

			<div class="flex w80p flex_direction_column mt1rem">
				<p class="sponsored_by_text text_center">Sponsored by:</p>
				<div class="flex align_center justify_content_center small_logos last_sponser_logos">
					<img class="mr2rem" src="<?php echo base_url() ?>assets/images/common_cause.png" alt="">
					<img class="ml2rem" src="<?php echo base_url() ?>assets/images/logo_us_texas.png" alt="">
				</div>
			</div>

		</section>

	</body>
<script>
	const site_url = "<?php echo base_url() ?>"
</script>
<script src="<?php echo base_url() ?>assets/js/step4.js"></script>
</html>