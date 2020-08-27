<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Step1</title>
	<link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/step1Last.css">
	<link rel="stylesheet" href="https://use.typekit.net/wks2sii.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/step1.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.3.0.js"></script>
</head>
<body>
  <div class="blurBackground">
    <div id="transition">
      <div>	
      </div>		  	
    </div>
  </div>
  <div class="videoMobileModal">
		<div class="videoMobileModalContainer">
			
		</div>
	</div>
	<div class="containerStep1">
		<div class="st1Logo">
			<img src="<?php echo base_url() ?>assets/images/st1Logo.png" alt="">
		</div>
		
		<div class="st1Video">
			<div class="st1Play">
				<div>
					<p>CLICK</p>
					<p>TO</p>
					<p>WATCH:</p>						
				</div>
				<div>
					<img class="playVideo" src="<?php echo base_url() ?>assets/images/st1Play.png" alt="">
				</div>				
			</div>
			<div class="stLogoText">
				<div><img src="<?php echo base_url() ?>assets/images/st1Logo2.png" alt=""></div>
				<div>
					<p>THE 2 MINUTE</p>
					<p>TEXAS CANDIDATE</p>
					<p>SURVEY TOUR</p>
				</div>
			</div>
		</div>

		<div class="st1StartSurvey">
			<a href="<?php base_url() ?>step2"><button>TAKE SURVEY NOW</button></a>
		</div>

		<div class="st1Sponsers">
			<p class="spBy"><i>Sponsored by:</i></p>
			<p class="comCaus">Common Cause & RepresentUs Texas</p>
			<img src="<?php echo base_url() ?>assets/images/st1SponsLogo.png" alt="">
		</div>
	</div>
</body>
<script>
	const site_url = "<?php echo base_url() ?>";
</script>
</html>