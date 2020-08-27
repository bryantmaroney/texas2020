<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Texas 2020 | Candidates Survey</title>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo(base_url()) ?>assets/css/combined.css">
	<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
</head>
<body>
	<div class="surveyHomeContainer">
		<div class="leftContainer">

			<div class="logo_section flex w100 justify_content_center align_center mb1rem pt2rem">
				<!-- <div class="auto_width flex justify_content_center"> -->
					<img class="main_logo_img" id="step1Logo" src="<?php echo base_url() ?>assets/images/logo-texas-2020-voter-guide.png" alt="">
				<!-- </div> -->
			</div>

			<div class="flex w100 justify_content_center flex_direction_column align_center homeText">
				<p class="w60p mt2rem"><strong>Dear Candidate,</strong></p>
				<p class="w60p mt2rem">Common Cause Texas and RepresentUs Texas will be launching an online voting tool, The Texas 2020 Voter Guide, on August 1st.</p>
				<p class="w60p mt2rem">We're asking all candidates running to represent Texas in the U.S. Congress and those running for seats in the Texas State Legislature to share their position on ten non-partisan reforms.</p>
				<p class="w60p mt2rem">Your responses to our brief survey will allow Texas voters to better understand how you’ll represent their interests once in office.</p>
				<p class="w60p mt2rem">Our guide will reach millions of Texas voters. Please complete the survey by August 1st to avoid having your positions on these common-sense reforms listed as "Did Not Respond.”</p>
				<p class="w60p mt2rem"><strong>Thank you for your time, and good luck with your campaign!</strong></p>
			</div>

			<div class="w100p flex justify_content_center align_center pt2rem startSection">
				<a href="<?php base_url() ?>step2"><button class="startSurvey">START THE SURVEY</button></a>
			</div>
		</div>
		<div class="rightContainer flex justify_content_center align_center flex_direction_column"> 
			<div class="video_section flex mt1rem mb1rem justify_content_center mb1rem">
				<div class="flex  relative_pos videoDiv">
					<video controls>
						<source src="<?php echo base_url() ?>assets/videos/new_survey_video.mp4" type="video/mp4">
					</video>
					<img class="video_cover" src="<?php echo base_url() ?>assets/images/VideoCover.png" alt="">
				</div>

			</div>
			<div class="sponsBy mb2rem">
				<h3 class="mb1rem">SPONSORED BY:</h3>
				<h3>COMMON CAUSE TEXAS & REPRESENTUS TEXAS</h3>
			</div>

			<div class="flex w80p flex_direction_column">

				<div class="flex align_center justify_content_center small_logos home_page">

					<img class="mr1rem" src="<?php echo base_url() ?>assets/images/common_cause.png" alt="">

					<img class="ml1rem" src="<?php echo base_url() ?>assets/images/logo_us_texas.png" alt="">

				</div>

			</div>

		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="<?php echo base_url() ?>assets/js/main.js"></script>
</html>