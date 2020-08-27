<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>

	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:image" content="<?= $cardShareDetails['image'] ?>" />
	<meta property="og:image:width" content="200" />
	<meta property="og:image:height" content="200" />
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Texas2020">
	<meta property="og:url" content="<?= $cardShareDetails['url'] ?>" />
	<meta property="og:title" content="<?= $cardShareDetails['title'] ?>" />
	<meta property="og:description" content="<?= $cardShareDetails['description'] ?>" /> -->

	<title>Texas 2020 | Candidate Survey PDF</title>

	<link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/google_fonts.css">

	<script async type="text/javascript" src="<?php echo site_url() ?>assets/js/jquery_script.min.js"></script>
	<script async type="text/javascript" src="<?php echo site_url() ?>assets/js/jquery_migrate.js"></script>

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/typekit.css">

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/style.css?v=1.2">

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/fonts/style.css">

	<script>
		const site_url = "<?php echo base_url() ?>";
	</script>
</head>

<body>
	<div class="embed_flex_parent">
		<embed class="embed_section" src="<?=base_url()?>assets/pdf/Texas2020_CandidateSurvey.pdf" width="800px" height="2100px" />
	</div>
</body>

</html>
