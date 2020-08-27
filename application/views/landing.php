<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:image" content="<?= $cardShareDetails['image'] ?>" />
	<meta property="og:image:width" content="200" />
	<meta property="og:image:height" content="200" />
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Texas2020">
	<meta property="og:url" content="<?= $cardShareDetails['url'] ?>" />
	<meta property="og:title" content="<?= $cardShareDetails['title'] ?>" />
	<meta property="og:description" content="<?= $cardShareDetails['description'] ?>" />

	<title>The Texas 2020 Voter Guide</title>

	<link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">

	<!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/google_fonts.css">

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.3.0.js"></script> -->
	<script async type="text/javascript" src="<?php echo site_url() ?>assets/js/jquery_script.min.js"></script>
	<script async type="text/javascript" src="<?php echo site_url() ?>assets/js/jquery_migrate.js"></script>

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/candidate_search/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/candidate_search/css/style.css?20200814180501">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/candidate_search/fonts/style.css?202008141805501">

	<!-- <link rel="stylesheet" href="https://use.typekit.net/wks2sii.css"> -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/typekit.css">

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/style.css?20200825103901">
	<!--<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/style_minified.min.css">-->

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/fonts/style.css">

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/flip.css">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" /> -->

	<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
	<script async type="text/javascript" src="<?php echo site_url() ?>assets/js/charts_loader.js"></script>
	<!--<script async src="<?php echo site_url() ?>assets/js/landing-vote.js"></script>-->

	<script>
		const site_url = "<?php echo base_url() ?>";
	</script>

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/animate.min.css">
	<script>
		const isJqueryLoaded = setInterval(async () => {
			if(window.jQuery){
				clearInterval(isJqueryLoaded)
				await createScript("<?php echo site_url() ?>assets/js/owl.carousel.min.js")
				const isOwlReady = setInterval(() => {
					if(jQuery('#carusel-mobile').owlCarousel) {
						clearInterval(isOwlReady)
						const scripts = [
							"<?php echo site_url() ?>assets/js/script.js?v=1.8",
							"<?php echo site_url() ?>assets/js/language.js",
							"<?php echo site_url() ?>assets/js/flip.js",
							// "<?php echo site_url() ?>assets/js/landingAnimations.js",
							"<?php echo site_url() ?>assets/js/mobile-vote.js?v=1.8",
							"<?php echo site_url() ?>assets/js/vote.js",
							"<?php echo site_url() ?>assets/js/sliderDots.js?v=1.8",
							"<?php echo site_url() ?>assets/js/modalToImg.js",
							"<?php echo site_url() ?>assets/js/sitemap.js?v=1.8",
							"<?php echo site_url() ?>assets/js/swipe.js"
						];

						scripts.forEach(async e => {
							await createScript(e)
						})
					}
				})
			}
		}, 100)

		const createScript = (url) => {
			let script = document.createElement('script');

			script.src = url;
			document.head.appendChild(script);

			return new Promise(res => {
				script.onload = function() {
					res(true)
				}
			})
		}
	</script>

	<!-- Facebook Pixel Code -->
	<script>
	  !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', '2547100782275426');
	  fbq('track', 'PageView');
	</script>
	<noscript>
	  <img height="1" width="1" style="display:none" 
	       src="https://www.facebook.com/tr?id=2547100782275426&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->


	<!--mobile swipe-->

	<!--<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
	<script>
	jQuery.ready(function(){
		window.fbAsyncInit = function() {
			FB.init({
			// appId      : '2547100782275426',
			appId: '566283450917572',
			xfbml      : true,
			version    : 'v7.0'
			});
			FB.AppEvents.logPageView();
		};

	})
	</script>-->
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId: '566283450917572',
				autoLogAppEvents: true,
				xfbml: true,
				version: 'v7.0'
			});
		};
	</script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146855188-3"></script> -->
	<script async src="<?php echo site_url() ?>assets/js/googletagmanager.js"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-146855188-3');
	</script>

</head>

<body>
	<div id="voteIndex" data-id="<?= $indexName ?>" style="display: none"></div>
	<div id="canvasImgContainer" style="display: none">
		<img src="<?= base_url()?>assets/images/optimized_new/agree-img_81004ee984b4722bfa634a172fd13183.png" width="55" height="auto">
		<img src="<?= base_url()?>assets/images/optimized_new/disAgree-img_14caaf49829185eb5105080455fa8ca3.png" width="55" height="auto">
		<img src="<?= base_url()?>assets/images/optimized_new/skip-img_01767667c54618f593302ca45c0f2634.png" width="55" height="auto">
		<img class="header-logo-right" src="<?=base_url()?>assets/images/headerLogoNew.png">
	</div>

	<div class="reminModal remainSuccess">
		<div class="reminModalContainer">
			<div class="reminResultIcone">
				<div><span class="closeReminModal">X</span></div>
				<div class="remindSuccessIcone">
					<img src="<?php base_url() ?>assets/images/optimized/remindSuccessIcone_optimized.png" width="125" height="auto">
					<p>GOOD JOB!</p>
				</div>
			</div>
			<div class="remindResultMessage">
				<p class="boldMess">Thanks for subscribing!</p>
				<p>We will notify as soon as the candidate</p>
				<p>search has launched.</p>
				<button class="closeReminModal">OK</button>
			</div>
		</div>
	</div>

	<div class="reminModal remainError">
		<div class="reminModalContainer">
			<div class="reminResultIcone">
				<div><span class="closeReminModal">X</span></div>
				<div class="remindSuccessIcone">
					<img src="<?php base_url() ?>assets/images/optimized/remindErrorIcon_optimized.png" width="125" height="auto">
					<p style="color:#B40006">Error!</p>
				</div>
			</div>
			<div class="remindResultMessage">
				<p class="errMess">Please enter a valid email address.</p>
				<button class="closeReminModal">OK</button>
			</div>
		</div>
	</div>

	<!-- header -->

	<div class="headerContainer" id="Section1">

		<p class="headerHamburger hambMenu"><img src="<?php echo base_url() ?>assets/images/optimized/mobileBarIcon_optimized.png" width="40" height="auto"></p>

		<div class="logo">
			<img src="<?php echo site_url() ?>assets/images/last_resized/liveNewLogo_resized.gif" width="192" heigt="auto" alt="">
		</div>

		<div class="headerRight">
			<div class="hrResponsive">
				<div class="hr1">
					<p class="sponsred_by"><?php echo $this->lang->line('sponsred_by') ?></p>
				</div>
				<div class="hr2">
					<img src="<?php echo site_url() ?>assets/images/headerRight1Logo.png" width="165" height="auto" alt="">
				</div>
			</div>

			<div class="hr3">
				<img src="<?php echo site_url() ?>assets/images/optimized_new/headerRight2Logo_75_70_d62f2ee1bcd0aa11cfbd70d33d8cd3ae.png" width="75" height="auto" alt="">
			</div>
		</div>

		<div class="mobileBarVersion animate__animated">
			<div><img class="mobile_logo_new" src="<?php echo base_url() ?>assets/images/optimized_new/barHomeLogo_optimized_80_50_29476e03f8e06d73c333610268d85643.png" width="80" height="auto"></div>
			<div class="mobileNavigateBar" data-to="Section1"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"> Home</div>
			<div class="mobileNavigateBar" data-to="candidate_search_section"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"> Choose Candidates</div>
			<div class="mobileNavigateBar" data-to="Section3"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"> Problems & Solutions</div>
			<div class="mobileNavigateBar" data-to="Section2"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"> 10-4 Texas</div>
			<div>Trusted Resources</div>
			<div class="mobileNavigateBar" data-to="footer_email_sec"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"> Make a Difference</div>
			<!-- <div>Texas 101</div> -->
		</div>

	</div>

	<!--nav-->
	<div class="nav animate__animated animate__fadeInUp">
		<div class="navContainer">
			<div class="navigateBar selectedNavBarItem" data-to="Section1"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"><p>Home</p></div>
			<div class="navigateBar" data-to="candidate_search_section"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"><p>Choose Candidates</p></div>
			<div class="navigateBar problemsAndSolutions" data-to="Section3"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"><p>Problems & Solutions</p></div>
			<div class="navigateBar" data-to="Section2"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"><p>10-4 Texas</p></div>
			<div class="navo" data-lite-tooltip-position="bottom" data-lite-tooltip='Coming Soon!' class="commingSoonBar"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"><p>Trusted Resources</p></div>
			<div class="navigateBar make_a_difference" data-to="footer_email_sec"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"><p>Make a Difference</p></div>
			<!-- <div class="navo" data-lite-tooltip-position="bottom" data-lite-tooltip='Coming Soon!' class="commingSoonBar"><img src="<?php echo base_url() ?>assets/images/optimized/star_optimized.png" width="25" height="auto"><p>Texas 101</p></div> -->
		</div>
	</div>

	<!-- section1 -->

	<div class="section1Container new_vh_height">

		<div class="language-content" data-lite-tooltip-position="bottom" data-lite-tooltip='Coming Soon!'>
			<div class="can-toggle can-toggle--size-large">

				<input id="c" class="changeLanguage" type="checkbox" value="english">
				<label for="c">
				<div class="can-toggle__switch" data-checked="SPANISH" data-unchecked="ENGLISH"></div>
				</label>
			</div>
		</div>

		<div class="section1Left section1Left_flex animate__animated  animate__slideInLeft">
			<div class="tooLate tooLate_flex">
				<div class="header_too_late_parent">
					<p class="equal"></p>
					<span class="is_not_too_late"><?php echo $this->lang->line('is_not_too_late') ?></span>
					<p class="equal"></p>
				</div>
				<div class="fixTexas fix_texas_font_size fix_texas">TO FIX TEXAS</div>
				<p class="simple_solutions_text solution_10"><i><?php echo $this->lang->line('solution_10') ?></i></p>
			</div>
			<!-- firstRed -->

			<div class="firstRed header_red_section animate__animated  animate__slideInLeft">
				<!--<span class="close_red_section">x</span>-->
				<div class="read1Title reminder">
					<!-- <p><?php echo $this->lang->line('reminder') ?></p> -->
					<p>Stay up to date with Texas 2020!</p>
				</div>
				<div class="redInp">
					<input type="text" class="enter_your_email" placeholder="<?php echo $this->lang->line('enter_your_email') ?>">
					<!-- <button class="remind_me"><?php echo $this->lang->line('remind_me') ?></button> -->
					<button class="remind_me">Yes, Please</button>
				</div>
				<p class="reminder_tiny_text">we won't spam you, we swear...</p>
			</div>
		</div>

		<div class="section1Right animate__animated animate__fadeInRight">
			<img src="<?php echo site_url() ?>assets/images/landingGif.gif" width="auto" height="auto" alt="">
		</div>
	</div>

	<div class="new_vh_height section1Container_for_small_sizes" style="display: none;">
		<div class="big_image_section">
			<img src="<?php echo site_url() ?>assets/images/landingGif.gif" width="auto" height="auto" alt="">
		</div>

		<div class="not_too_late_section">
			<div class="tooLate tooLate_flex">
				<div class="header_too_late_parent">
					<p class="equal"></p>
					<span class="is_not_too_late"><?php echo $this->lang->line('is_not_too_late') ?></span>
					<p class="equal"></p>
				</div>
				<div class="fixTexas fix_texas_font_size fix_texas">TO FIX TEXAS</div>
				<p class="simple_solutions_text solution_10"><i><?php echo $this->lang->line('solution_10') ?></i></p>
			</div>
		</div>

		<!-- hiddenHeaderPart -->

		<div class="hiddenHeaderRight">
			<div class="hiddenHrResponsive">
				<div class="hiddenHr1">
					<p class="sponsred_by"><?php echo $this->lang->line('sponsred_by') ?></p>
				</div>

				<div class="hiddenHr2">
					<img src="<?php echo site_url() ?>assets/images/headerRight1Logo.png" width="165" height="auto" alt="">
				</div>
			</div>

			<div class="hiddenHr3">
				<img src="<?php echo site_url() ?>assets/images/optimized_new/headerRight2Logo_resized_5447588bb5a769a228f1e418b31609f4.png" width="75" height="auto" alt="">
			</div>
		</div>

		<div class="last_red_section">
			<div class="firstRed header_red_section">
				<!--<span class="close_red_section">x</span>-->
				<div class="read1Title"><p class="reminder"><?php echo $this->lang->line('reminder') ?></p></div>
				<div class="redInp">
					<input type="text" class="enter_your_email" placeholder="<?php echo $this->lang->line('enter_your_email') ?>">
					<button class="remind_me"><?php echo $this->lang->line('remind_me') ?></button>
				</div>
				<p class="reminder_tiny_text">we won't spam you, we swear...</p>
			</div>
		</div>

	</div>

	<!-- learn More -->

	<div class="learnMore learnMoreFirst">
		<div class="animate__animated  animate__slideInLeft">
			<img src="<?php echo site_url() ?>assets/images/redArrowBottom.png" width="26" height="auto" alt="">
			<span class="learn_more"><?php echo $this->lang->line('learn_more') ?></span>	
		</div>

		<div class="contactUs animate__animated  animate__slideInRight">
			<span class="connect_us"><?php echo $this->lang->line('connect_us') ?></span>

			<!--<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url()?>" 
			onclick="window.open(this.href, 'mywin',`left=${screen.width/2 - 700/2},top=${screen.height/2 - 700/2},width=700,height=700,toolbar=1,resizable=0`); return false;" 
			target="_blank"><img src="<?php echo site_url() ?>assets/images/Facebook.png"></a>-->

			<a href="https://www.facebook.com/pg/Texas2020VoterGuide/posts/?" target="_blank"><img src="<?php echo site_url() ?>assets/images/optimized/Facebook_optimized.png" width="25" height="auto"></a>

			<a href="https://www.instagram.com/texasvoterguide/" target="_blank"><img src="<?php echo site_url() ?>assets/images/optimized/Instagram_optimized.png" width="25" height="auto"></a>

			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url() ?>&title=LinkedIn%20Developer%20Network&summary=My%20favorite%20developer%20program&source=LinkedIn"
			onclick="window.open(this.href, 'mywin',`left=${screen.width/2 - 700/2},top=${screen.height/2 - 700/2},width=700,height=700,toolbar=1,resizable=0`); return false;" 
			target="_blank">
				<img src="<?php echo site_url() ?>assets/images/optimized/Linkedin_optimized.png" width="25" height="auto">
			</a>

			<a href="http://pinterest.com/pin/create/button/?url=<?php echo base_url() ?>&description=Help US create more informed Voters in Texas and share this page"
			onclick="window.open(this.href, 'mywin',`left=${screen.width/2 - 700/2},top=${screen.height/2 - 700/2},width=700,height=700,toolbar=1,resizable=0`); return false;"
			target="_blank">
				<img src="<?php echo site_url() ?>assets/images/optimized/Pinterest_optimized.png" width="25" height="auto">
			</a>

			<a href="https://twitter.com/share?ref_src=<?php echo base_url()?>"
			onclick="window.open(this.href, 'mywin',`left=${screen.width/2 - 700/2},top=${screen.height/2 - 700/2},width=700,height=700,toolbar=1,resizable=0`); return false;" 
			target="_blank">
				<img src="<?php echo site_url() ?>assets/images/optimized/Twitter_optimized.png" width="25" height="auto">
			</a>
		</div>
	</div>
	<!-- 10 solutions -->

	<div class="summary-modal-container" id="summaryModal">
		<div class="summary-modal-section">
			<div class="summary-modal-header">
				<img src="<?=base_url()?>assets/images/optimized_new/x_icon_c1142fedf8eed545bc5ad327c74c64d9.png" height="auto" width="50" class="close-summary-modal" id="closeSummaryModal">
				<img class="header-logo-left" src="<?=base_url()?>assets/images/sHeader-logo1.png" width="455" height="auto">
				<img class="header-logo-center" src="<?=base_url()?>assets/images/sHeader-logo2.png" width="35" height="auto">
				<img class="header-logo-right" src="<?=base_url()?>assets/images/optimized_new/sHeader-logo3_f93cd7b3b52d743e48a6cfe81b9b2687.png">
			</div>

			<div class="summary-modal-body">
				<!--<p class="big">10 No-Brainer</p>
				<p>Non-Partisan Solutions</p>-->
				<div class="vote-result-container">
					<div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p>1
								<span>End Gerrymandering</span>
							</p>
						</div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-disagree.png">
							</div>
							<p>2
								<span>Vote By Mail</span>
							</p>
						</div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p>3
								<span>Reveal the Writers</span>
							</p>
						</div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p>4
								<span>Modernize Elections</span>
							</p>
						</div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p class="last-item">5
								<span>Ranking Your Candidates</span>
							</p>
						</div>
					</div>
					<div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p>6
								<span>Ban the Barriers</span>
							</p>
						</div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p>7
								<span>Limit the Lobbyists</span>
							</p>
						</div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p>8
								<span>Rethink Registration</span>
							</p>
						</div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p>9
								<span>Clean Up Elections</span>
							</p>
						</div>
						<div class="vote-item">
							<div>
								<img src="<?=base_url()?>assets/images/summary-agree.png">
							</div>
							<p class="last-item">10
								<span>Tune In Texas</span>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="summary-modal-footer">
				<img class="footer-logo" src="<?=base_url()?>assets/images/scaled/summary-footer-logo_22ade6faf79c5b59689dd1b0aac5714f_scale.png" width="300" height="auto">
				<div class="shareVote">
					<img src="<?=base_url()?>assets/images/scaled/mobShare_15_15.png" alt="" width="15px" height="auto">
					<span>SHARE</span>
				</div>
			</div>
		</div>
	</div>

	<!-- Candidate Search section -->
	<?php $this->load->view('candidate_search') ?>

	<!--mobile cards-->
	<?php $this->load->view('mobileCards') ?>

	<!--desktop cards-->
	<?php $this->load->view('desktopCards') ?>

	<div id="Section2" class="solutions10Container">
		<div class="solutionLeft animate__animated">
			<img src="<?php echo site_url() ?>assets/images/optimized/10SolImage_optimized.png" width="760" height="auto" alt="">
		</div>
		<div class="solutionRight animate__animated">
			<img class="sol_logo_show_on_desk" src="<?php echo site_url() ?>assets/images/optimized/10SolLogo_optimized.png" width="455" height="auto" alt="">
			<img class="sol_logo_show_on_mobile" src="<?php echo site_url() ?>assets/images/scaled/10SolLogo_mobile_b6c84f388845984a1af4d90f87dc8af5_scaled.png" width="455" height="auto" alt="">
			<p>The non-partisan organizations <i class="boldItalic">Common Cause</i> and <b><i>RepresentUs Texas</i></b> have joined forces and created <b>10 (solutions) 4 Texas.</b></p>
			<p><b>10-4 Texas is a collection of 10 common sense, non-partisan solutions.</b></p>
			<p>If we genuinely want to fix Texas, we need to understand Texas. We made that process as brief, engaging and painless as possible <br>
				<b><i>Let’s all be informed voters for Texas 2020.</i></b></p>
		</div>
	</div>

	<!-- DISTRICTS -->
	<div class="disCont" id="Section4" style="display: none;">

	</div>

	<div class="learnMore learnMoreFirst">
		<div style="display:none" class="">
			<span class="learn_more"><?php echo $this->lang->line('learn_more') ?></span>	
		</div>

		<div class="contactUs">
			<span class="connect_us"><?php echo $this->lang->line('connect_us') ?></span>

			<!-- <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url()?>" 
			onclick="window.open(this.href, 'mywin',`left=${screen.width/2 - 700/2},top=${screen.height/2 - 700/2},width=700,height=700,toolbar=1,resizable=0`); return false;" 
			target="_blank"><img src="<?php echo site_url() ?>assets/images/Facebook.png"></a>-->

			<a href="https://www.facebook.com/pg/Texas2020VoterGuide/posts/?" target="_blank"><img src="<?php echo site_url() ?>assets/images/optimized/Facebook_optimized.png" width="25" height="auto"></a>

			<a href="https://www.instagram.com/texasvoterguide/" target="_blank"><img src="<?php echo site_url() ?>assets/images/optimized/Instagram_optimized.png" width="25" height="auto"></a>

			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url() ?>&title=LinkedIn%20Developer%20Network&summary=My%20favorite%20developer%20program&source=LinkedIn"
			onclick="window.open(this.href, 'mywin',`left=${screen.width/2 - 700/2},top=${screen.height/2 - 700/2},width=700,height=700,toolbar=1,resizable=0`); return false;" 
			target="_blank">
				<img src="<?php echo site_url() ?>assets/images/optimized/Linkedin_optimized.png" width="25" height="auto">
			</a>

			<a href="http://pinterest.com/pin/create/button/?url=<?php echo base_url() ?>&description=Help US create more informed Voters in Texas and share this page"
			onclick="window.open(this.href, 'mywin',`left=${screen.width/2 - 700/2},top=${screen.height/2 - 700/2},width=700,height=700,toolbar=1,resizable=0`); return false;"
			target="_blank">
				<img src="<?php echo site_url() ?>assets/images/optimized/Pinterest_optimized.png" width="25" height="auto">
			</a>

			<a href="https://twitter.com/share?ref_src=<?php echo base_url()?>"
			onclick="window.open(this.href, 'mywin',`left=${screen.width/2 - 700/2},top=${screen.height/2 - 700/2},width=700,height=700,toolbar=1,resizable=0`); return false;" 
			target="_blank">
				<img src="<?php echo site_url() ?>assets/images/optimized/Twitter_optimized.png" width="25" height="auto">
			</a>
		</div>
	</div>

	<!-- 2nd red section -->

	<div id="footer_email_sec" class="secondRed firstRed animate__animated">

		<div class="read1Title">
			<!-- <p class="get_reminder"><?php echo $this->lang->line('get_reminder') ?></p> -->
			<p>If you're ready to make a difference, join us!</p>
		</div>

		<div class="redInp">
			<input type="text" class="enter_your_email" placeholder="<?php echo $this->lang->line('enter_your_email') ?>">
			<button class="signup">Get Involved</button>
		</div>
	</div>

	<!-- footer -->

	<div class="footerSection animate__animated">

		<p class="copyright">Copyright © 2020 by Texas2020.org.</p>
		<p class="copyright">&nbsp;&nbsp;All rights reserved.</p>

		<p class="copyright terms_links privacy_popup">Privacy</p>
		<p class="copyright terms_links terms_popup">Terms of Use</p>

	</div>

	<div class="summary-modal-container" id="footerModal">
		<div class="summary-modal-section">
			<div class="summary-modal-header">
				<h1>Privacy</h1>
				<img src="<?=base_url()?>assets/images/optimized_new/x_icon_c1142fedf8eed545bc5ad327c74c64d9.png" height="auto" width="50" class="close-summary-modal closePrivacyModal">
			</div>
			<div class="summary-modal-body Fmodal">
				<p><strong>Texas2020.org</strong> is a voter resource for Texans, a collaboration between RepresentUs Texas and Common Cause Texas.</p><strong>
				<br>
				<p><strong>RepresentUs</strong> is a nonpartisan, nonprofit 501 (c)(3) organization with headquarters in Florence, MA. We do not support or oppose any political party or candidate. Our goal is to ensure that all citizens have an equal voice in government so that our leadership truly does represent all of us.</p>
                                <br>
				<p><strong>Common Cause</strong> is a nonpartisan, nonprofit 501(c)(4) grassroots organization dedicated to upholding the core values of American democracy. We work to create open, honest, and accountable government that serves the public interest; promote equal rights, opportunity, and representation for all; and empower all people to make their voices heard in the political process.</p>
                                <br>
				<p>Our privacy policy explains how we use information that you may provide while visiting Texas2020.org and demonstrates our firm commitment to Internet privacy. Texas2020.org may modify this policy from time to time; we encourage you to check this page when revisiting this website. By using this site, you agree to the terms of this Privacy Policy and the Terms of Use.</p>
                                <br>
				<h2>How We Use Your Information</h2>
				<p>When you register or agree to be contacted by other non-partisan democracy reform organizations, or take any other action on our site, we may ask you to give us contact information, including your name and your email address. We use this information to operate this site, send news and information to you about Texas2020.org, and the movement to educate and encourage more voter engagement in our political process.</p>
                                <br>
				<h2>Cookies and Data Tracking</h2>
				<p>A cookie is a piece of data stored on the user’s hard drive containing information about the user. We may use a cookie to help us compile aggregate data about visitors to the site and their interaction with the site to improve the operation of the site and/or offer better site experiences and tools in the future. If you wish to disable these cookies, the help portion of the toolbar on most browsers will tell you how to do that.</p>
                                <br>
				<p>We also use third-party services such as Google Analytics and the Facebook advertising pixel to help us understand traffic patterns, our marketing and to know if there are problems with our website. We may also use embedded images in emails to track open rates for our mailings so that we can tell which mailings appeal most to Texas2020.org supporters.</p>
                                <br>
				<p>URLs included in emails may contain an ID that enables us to correctly identify the person who takes action using a web page. We use these URLs to simplify the process of signing petitions and filling out surveys. We may occasionally present a shortened URL that references a longer URL which contains an id—we do this to simplify the display, to prevent links from becoming broken when copied, and to ensure compatibility with email programs which do not handle long URLs. When a shortened URL appears in an email, you will see the full URL in the browser’s address bar when you access the page.</p>
                                <br>
				<h2>Advertising</h2>
				<p>We may place online advertising with third-party vendors, including Google and Facebook, which will be shown on other sites on the internet. In some cases, third-party vendors may decide which ads to show you based on your prior visits to the site. At no time will you be personally identified to those third-party vendors, nor will any of the information you share with us be shared with those third-party vendors. If you prefer to opt-out of the use of these third-party cookies on the site, you can do so by visiting the Network Advertising Initiative opt-out page.</p>
                                <br>
				<h2>Links to Other Sites</h2>
				<p>The privacy policies and practices contained in this Privacy Statement do not apply to ANY external links. This Privacy Statement only applies to our site. It does not cover sites that are linked to by this site or sites for which we are not responsible (“linked sites”). These linked sites will have their policies and practices with which may be different from ours. We, therefore, encourage you to familiarize yourself with the policies and practices of the linked sites, if you provide personal information to them.</p>
                                <br>
				<h2>Changes to Policy</h2>
				<p>We retain the right to amend or otherwise update this Privacy Statement at any time. By using our site, you consent to the collection and use of the information as we have described. If we change our policies and practices, we will post the changes in our Privacy Statement so that you are always aware of them. With this knowledge, you can make an informed decision about whether you wish to provide personal information to us.</p>

			</div>
			<div class="summary-modal-footer">
				<img class="footer-logo" src="<?=base_url()?>assets/images/scaled/summary-footer-logo_22ade6faf79c5b59689dd1b0aac5714f_scale.png" width="300px" height="auto">
			</div>
		</div>
	</div>

	<div class="summary-modal-container" id="TermsModal" >
		<div class="summary-modal-section">
			<div class="summary-modal-header">
				<h1>Terms of Use</h1>
				<img src="<?=base_url()?>assets/images/optimized_new/x_icon_c1142fedf8eed545bc5ad327c74c64d9.png" height="auto" width="50px" class="close-summary-modal closeTermsModal">
			</div>
			<div class="summary-modal-body Fmodal">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
				<br>
				<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
				<br>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
				<br>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
				<br>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
			</div>
			<div class="summary-modal-footer">
				<img class="footer-logo" src="<?=base_url()?>assets/images/scaled/summary-footer-logo_22ade6faf79c5b59689dd1b0aac5714f_scale.png" width="300" height="auto">
			</div>
		</div>
	</div>

</body>

<script>
window.onload = () => {
	jQuery(document).ready(function($) {
		var language = "<?php echo $this->session->userdata('language'); ?>";

		$('.changeLanguage').val(language);

		if($('.changeLanguage').val() == 'spanish') {
			$('input[type="checkbox"]').prop("checked", true)
		}
	})
}

</script>
</html>
