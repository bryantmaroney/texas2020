<!DOCTYPE html>
<html lang="en">
<head>
    <title>Texas</title>
    <link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/style.css?20200814180501">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css?20200814180501">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Popper JS -->
    <script src="<?=base_url()?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script>
        window.fbAsyncInit = function() {
      FB.init({
      appId            : '566283450917572',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v7.0'
      });
    };
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script src="<?= base_url() ?>assets/js/script.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/createImg.js" type="text/javascript"></script>
</head>
<body>
    <div id="choiceIndex" style="display: none; font-family: 'Lato'"></div>
    <input id="baseUrl" type="hidden" value="<?= base_url() ?>">
    <div id="canvasImgContainer" style="display: none">
        <img src="<?=base_url()?>/assets/images/shareImgs/headerImg.png">
        <img src="<?=base_url()?>/assets/images/shareImgs/container.png">
        <img src="<?=base_url()?>/assets/images/shareImgs/icon.png">
        <img src="<?=base_url()?>/assets/images/shareImgs/footerImg.png">
        <img src="<?=base_url()?>/assets/images/Not_Up_For_Election.jpg">
    </div>
    <div id="districtImgContainer" style="display: none;">
        <img src="<?=base_url()?>assets/images/b1.png" alt="">
        <img src="<?=base_url()?>assets/images/districts/U.s. House <?=isset($district['congressional_district_id']) ? $district['congressional_district_id'] : ''?>.png" alt="">
        <img src="<?=base_url()?>assets/images/districts/Texas House <?=isset($district['state_lower_house_district_1_id_value']) ? $district['state_lower_house_district_1_id_value'] : ''?>.png" alt="">
        <img src="<?=base_url()?>assets/images/districts/Texas Senate <?=isset($district['state_upper_house_district_1_id_value']) ? $district['state_upper_house_district_1_id_value'] : ''?>.png" alt="">
    </div>