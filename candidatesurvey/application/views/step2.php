<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">
	<title>Texas 2020 | Candidates Survey</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">

	<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/step2.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/combined.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

	<div class="logo_section flex w100 justify_content_center align_center mb2rem pt2rem">
		<!-- <div class="auto_width flex justify_content_center"> -->
			<img id="step2Logo" src="<?php echo base_url() ?>assets/images/logo-texas-2020-voter-guide.png" alt="">
		<!-- </div> -->
	</div>

	<br>

	<div class="step1Container">

		<div class="step1ItemsContainer">

			<!-- <div class="itemsBody">
				<p class="bodyTitle">Step 1: We need a little info about you..</p>	
			</div> -->

			<div class="candidateDataSection">

				<div>
					<span>FIRST NAME</span><br>
					<input class="first_name" type="text" placeholder="First Name">
				</div>

				<div>
					<span>LAST NAME</span><br>
					<input type="text" class="last_name disabled_input" placeholder="Last Name" readonly="">
				</div>

			</div>

			<div class="selectOfficeSection">

				<p>What office are you seeking?</p>

				<div class="offices">
					<div data-office="U.S. Senate">
						<span class="officeOption">A</span>
						<span>US Senate</span>
					</div>

					<div data-office="U.S. House">
						<span class="officeOption">B</span>
						<span>US House</span>
					</div>

					<div data-office="T.X. House">
						<span class="officeOption">C</span>
						<span>TX House</span>
					</div>

					<div data-office="T.X. Senate">
						<span class="officeOption">D</span>
						<span>TX Senate</span>
					</div>
				</div>
			</div>

			<div class="photoSection">

				<div class="enterDistrict">
					<span>Which District?</span>
					<p class="district_not_required_text">District is not required</p>
					<input type="number" class="disabled_input which_district" placeholder="Enter District Number" readonly="">
				</div>

				<div class="dropPhoto">

					<span>Please provide a photo:</span>

					<div class="formButtonSection">
						<form action="<?= base_url() ?>candidate/image/upload" class="dropzone" id="my-awesome-dropzone">

							<div class="dz-message" data-dz-message>
								<p>Drop your</p>
								<p>photo here</p>
								<p class="red">Or</p>
								<p class="red">Upload</p>
								<p class="red">Image size: </p>
								<p class="red">2" x 2"</p>
							</div>

							<div class="fallback">
								<input name="file" type="file" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="flex flex_direction_column w80p" style="margin: 0 auto;">

		<p class="sponsored_by_text text_center">Sponsored by:</p><br>

		<div class="flex align_center justify_content_center small_logos">
			<img class="mr2rem" src="<?php echo base_url() ?>assets/images/common_cause.png" alt="">
			<img class="ml2rem" src="<?php echo base_url() ?>assets/images/logo_us_texas.png" alt="">
		</div>

		<div class="flex justify_content_center mt2rem">
			<button type="btn" class="btn_stlye mb2rem step1_sbm_btn">Submit</button>
		</div>
	</div>

	<div class="modalManually" id="step2Validation" style="display: none;" >

      	<div class="manuallyContainer">
	          <div class="row" style="padding: 1px 15px 0 10px; display: flex; justify-content: flex-end;">
	              <span class="close_mannual_modal"><img src="<?php echo base_url(); ?>assets/images/close-icon.png" style="cursor: pointer;" /></span>
	          </div>
	          <div><h4 class="step2Validation">Please enter all data!</h4></div>
     	 </div>
	</div>

	<script>

		var site_url = "<?php echo base_url() ?>";

		Dropzone.options.myAwesomeDropzone = {
			maxFiles: 1,
			acceptedFiles: 'image/*',
			thumbnailWidth: 200,
			thumbnailHeight: 200,
			accept: function(file, done) {
				// console.log("uploaded");
				done();
			},

			init: function() {
				this.on("maxfilesexceeded", function(file){
					alert("No more files please!");
				});
			},
			addRemoveLinks: true,
			removedfile: function(file) {
			 	$.ajax({
					url: site_url+'remove/session/image',
					type: 'get',
					success:function(r) {
					}
				})

				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
			}
		}

	</script>

	<script src="<?php echo base_url() ?>assets/js/step2.js"></script>
	<script>
		var site_url = "<?php echo base_url() ?>";
	</script>

</body>

</html>
