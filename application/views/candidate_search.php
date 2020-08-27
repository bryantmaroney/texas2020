
<div id="candidate_search_section">
	<div class="mobile_view_content">

		<div class="body_content">
			<div class="row cs_full_content">
				<div class="col-md-12 flex_props">
					<div class="district_images d-flex flex-wrap">
						<a href="javascript:void(0)"><img src="<?php echo site_url() ?>assets/candidate_search/images/1.png" alt="" width="220" height="auto">
							<h2>U.S. <br> Senate</h2>
						</a>
						<a href="javascript:void(0)"><img src="<?php echo site_url() ?>assets/candidate_search/images/2.png" alt="" width="220" height="auto">
							<h2>U.S. <br> House</h2>
						</a>
						<a href="javascript:void(0)"><img src="<?php echo site_url() ?>assets/candidate_search/images/3.png" alt="" width="220" height="auto">
							<h2>Texas <br> house</h2>
						</a>
						<a href="javascript:void(0)"><img src="<?php echo site_url() ?>assets/candidate_search/images/4.png" alt="" width="220" height="auto">
							<h2>Texas <br> Senate</h2>
						</a>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<img src="/assets/images/Candidate_Search_Header.png" style="width:90%;">
							<br/><br/>
							<h1 style="text-align: center; color: #b5000f; font-size: 36px;">
								FIND. COMPARE. CHOOSE
							</h2>
						</div>
						<div class="col-lg-6" id="candidate_search_form">
							<form class="form_card" method="post" action="<?=base_url()?>candidatesearch/home/getInfoStep1">
								<!-- <input placeholder="Email Address" type="text"> -->
                                <input placeholder="Street Address" type="text" name="address" value="<?=isset($_SESSION['inputs']['address']) ? $_SESSION['inputs']['address'] : '' ?>" required>
								<div class="d-flex justify-content-between">
									<input class="city" placeholder="City" type="text" name="city" value="<?=isset($_SESSION['inputs']['city']) ? $_SESSION['inputs']['city'] : '' ?>" required>
									<input class="zip" placeholder="Zip" type="text" name="zipcode"  pattern=".{5}" title="You can use only 5 digit Zip Code" value="<?=isset($_SESSION['inputs']['zipcode']) ? $_SESSION['inputs']['zipcode'] : '' ?>" required>
								</div>
								<button class="start_btn" type="submit">Find My Candidates</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
