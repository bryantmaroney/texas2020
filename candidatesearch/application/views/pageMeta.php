<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta property="fb:app_id" content="566283450917572" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />
	<meta property="og:image" content="<?= $cardShareDetails['image'] ?>">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Texas2020Endgerry">
	<!--<meta property="og:url"                content="" />-->
	<meta property="og:title"              content="<?= $cardShareDetails['title'] ?>" />
	<meta property="og:description"        content="<?= $cardShareDetails['description'] ?>" />
	<!--<meta http-equiv="refresh" content="1">-->
</head>
<script>
	const url = "<?php echo $cardShareDetails['url'] ?>";
	window.location.href = url;
</script>
<body>
	
</body>
</html>