<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<!-- <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap-4.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-4.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/charts_loader.js"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script> -->

</head>
<body>
	<div>
		<button class="clearCandidates">Click here to clear submitted candidates</button>
		<button style="float: right;"><a href="<?php echo base_url() ?>/admin/logout">Log Out</a></button>
		<!-- <a style="float: right;font-size: 25px" href="<?php echo base_url() ?>/admin/logout">
          <span class="glyphicon glyphicon-log-out"></span>
        </a> -->
	</div>
	<div class="modal fade" id="cleanCandidatesSuccess" data-backdrop="static">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-body modalContainer">
	                <div class="row" style="padding: 10px 20px 0 10px; display: flex; justify-content: flex-end;">
	                    <span class="close_modal"><img src="<?php echo base_url(); ?>assets/images/close-icon.png" style="cursor: pointer;" /></span>
	                </div>
	                <div class="row qestModalContainer">
	                   <div style="width: 100%;font-size: 25px; color: #213D76;padding: 5%;">Submitted Candidates Have Been Cleared</div>             
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


	<div class="card">
	  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Test Candidates</h3>
	  <div class="card-body">
	    <div id="table" class="table-editable">
	      <!-- <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
	            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span> -->
	      <table class="table table-bordered table-responsive-md table-striped text-center">
	        <thead>
	          <tr>
	          	<!-- <th class="text-center">Id</th> -->
	            <th class="text-center">Photo</th>
	            <th class="text-center">First name</th>
	            <th class="text-center">Last name</th>
	            <th class="text-center">Seeking office</th>
	            <!-- <th class="text-center">District</th> -->
	            <th class="text-center">Election comment</th>
	            <th class="text-center">Politics comment</th>
	            <!-- <th class="text-center">Active</th>	                 	         -->
	            <th class="text-center">Answers</th>
	            <th class="text-center">Remove</th>
	          </tr>
	        </thead>
	        <tbody>
				<?php foreach ($test_candidates as $test_candidate) { ?>
			         <tr candidateID="<?= $test_candidate['id'] ?>">
			          	<!-- <th class="text-center"><?php echo $test_candidate['id'] ?></th> -->
			          	<td class="pt-3-half">
				          	<?php if (!empty($test_candidate['local_profile_photo'])) { ?>
				            	<img class="testCandidateImage" style="width: 100px;height: 100px;object-fit: cover;" src="<?php echo $test_candidate['local_profile_photo'] ?>" alt="">
				            		
				          	<?php } else { ?>
				            	<img class="testCandidateImage" style="width: 100px;height: 100px;object-fit: cover;" src="<?php echo base_url(); ?>assets/images/candidate_dummy.png" alt="">
				            		
				          	<?php } ?>
				          	<!-- <input type="file" class="changePhotoInp" name="test_candidate_photo" style="display: none;"> -->
				          	<div class="button-wrapper">
							  <span class="label">
							    Upload image
							  </span>
							  
							    <input type="file" name="upload" id="upload" class="upload-box changePhotoInp" placeholder="Upload File">
							  
							</div>
				          	<!--<button class="btn btn-primary btn-sm changeProfilePhotoTest">Change</button>-->
			          	</td>
			            <td class="pt-3-half" name="first_name" contenteditable="true"><?php echo $test_candidate['first_name'] ?></td>
			            <td class="pt-3-half" name="last_name" contenteditable="true"><?php echo $test_candidate['last_name'] ?></td>
			            <td class="pt-3-half" name="seeking_office" contenteditable="true"><?php echo $test_candidate['seeking_office'] ?></td>
			            <!-- <td class="pt-3-half" name="which_district" contenteditable="true"><?php echo $test_candidate['which_district'] ?></td> -->
			            <td class="pt-3-half comSect" name="election_comment" contenteditable="true"><?php echo $test_candidate['election_comment'] ?></td>
			            <td class="pt-3-half comSect" name="politics_comment" contenteditable="true"><?php echo $test_candidate['politics_comment'] ?></td>
			            <!-- <td class="pt-3-half" name="active" contenteditable="true"><?php echo $test_candidate['active'] ?></td>			             -->
			            <td class="answers" >
			            	<i class="fab fa-aws openAnswers"></i>
			            	<div class="modal fade" id="answersModal" candidateID="<?= $test_candidate['id'] ?>" data-backdrop="static">
							    <div class="modal-dialog modal-lg">
							      <div class="modal-content">
							        <div class="modal-body modalContainer" style="width: 100%;">
							          <div class="row" style="padding: 20px 20px 0 10px; display: flex; justify-content: flex-end;">
							            <span class="close_modal_btn close_modal"><img src="<?php echo base_url(); ?>assets/images/close-icon.png" style="cursor: pointer;" /></span>
							          </div>
							          <div class="row answersCont">
							            <div name="gerrymandering">
							            	<lable>END GERRYMANDERING</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['gerrymandering'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['gerrymandering'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div name="empower">
							            	<lable>EMPOWER SMALL DONORS</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['empower'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['empower'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div name="ranked_choice">
							            	<lable>RANKED CHOICE VOTING</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['ranked_choice'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['ranked_choice'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div name="term">
							            	<lable>TERM LIMITS</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['term'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['term'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div name="auto_reg">
							            	<lable>AUTOMATIC VOTER REGISTRATION</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['auto_reg'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['auto_reg'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>

							            <div name="LOBBING">
							            	<lable>ELIMINATE LOOPHOLES</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['LOBBING'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['LOBBING'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div name="WHOWRITESOURLAWS">
							            	<lable>WHO WRITES OUR LAWS</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['WHOWRITESOURLAWS'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['WHOWRITESOURLAWS'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div name="CRIMINALIZE">
							            	<lable>CRIMINALIZE DISINFORMATION</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['CRIMINALIZE'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['CRIMINALIZE'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div name="LIMIT">
							            	<lable>LIMIT THE LOBBYISTS</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['LIMIT'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['LIMIT'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div name="CAMPAIGN">
							            	<lable>CAMPAIGN FINANCE REFORM</lable> 
							            	<div>
							            		<button class="<?php if($test_candidate['CAMPAIGN'] == 'agree') { ?> selectedVariant <?php }?>">Agree</button>
							            		<button class="<?php if($test_candidate['CAMPAIGN'] == 'disagree') { ?> selectedVariant <?php }?>">Disagree</button>
							            	</div>
							            </div>
							            <div><button class="btn btn-success editSubm">Edit</button></div>
							          </div> 
							        </div>
							      </div>
							    </div>
							 </div>
			            </td>
			            <td>
			              <span class="table-remove"><button type="button"
			                  class="btn btn-danger btn-rounded btn-sm my-0 deleteTestCandidate">Remove</button></span>
			            </td>
			         </tr>	 
				<?php } ?>
	        </tbody>
	      </table>
	    </div>
	  </div>
	</div>


	<div class="card">
	  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Submitted Candidates</h3>
	  <div class="card-body">
	    <div id="table" class="table-editable">
	      <table class="table table-bordered table-responsive-md table-striped text-center">
	        <thead>
	          <tr>
	            <th class="text-center">Photo</th>
	            <th class="text-center">First name</th>
	            <th class="text-center">Last name</th>
	            <th class="text-center">Seeking office</th>
	            <th class="text-center">District</th>
	            <th class="text-center">Election comment</th>
	            <th class="text-center">Politics comment</th>
	            <th class="text-center">Active</th>	                 	        
	          </tr>
	        </thead>
	        <tbody>
				<?php foreach ($submitted_candidates as $submitted_candidate) { ?>
			         <tr candidateID="<?= $submitted_candidate['id'] ?>">
			          	
			          	<td class="pt-3-half">
				          	<?php if (!empty($submitted_candidate['local_profile_photo'])) { ?>
				            	<img class="testCandidateImage" style="width: 100px;height: 100px;object-fit: cover;" src="<?php echo $submitted_candidate['local_profile_photo'] ?>" alt="">
				            		
				          	<?php } else { ?>
				            	<img class="testCandidateImage" style="width: 100px;height: 100px;object-fit: cover;" src="<?php echo base_url(); ?>assets/images/candidate_dummy.png" alt="">
				            		
				          	<?php } ?>
				          	<div class="button-wrapper">
							  <span class="label">
							    Upload image
							  </span>
							  
							    <input type="file" name="upload" id="upload" class="upload-box changeSubmPhotoInp" placeholder="Upload File">
							  
							</div>
			          	</td>
			            <td class="pt-3-half" name="first_name" ><?php echo $submitted_candidate['first_name'] ?></td>
			            <td class="pt-3-half" name="last_name" ><?php echo $submitted_candidate['last_name'] ?></td>
			            <td class="pt-3-half" name="seeking_office" ><?php echo $submitted_candidate['seeking_office'] ?></td>
			            <td class="pt-3-half" name="which_district" ><?php echo $submitted_candidate['which_district'] ?></td>
			            <td class="pt-3-half comSect" name="election_comment" ><?php echo $submitted_candidate['election_comment'] ?></td>
			            <td class="pt-3-half comSect" name="politics_comment" ><?php echo $submitted_candidate['politics_comment'] ?></td>
			            <td class="pt-3-half" name="active" ><?php echo $submitted_candidate['active'] ?></td>			            
			      		       
			         </tr>	 
				<?php } ?>
	        </tbody>
	      </table>
	    </div>
	  </div>
	</div>

</body>
<script>
	var site_url = "<?php echo base_url() ?>";
	
	$(document).on('click', '.clearCandidates', function(event) {
		$.ajax({
			url: site_url + 'admin/clean/candidates',
			type: 'GET',
			success:function(response) {
				console.log(response);
				$('#cleanCandidatesSuccess').modal('show');
			}
		})
		
	});

	$(document).on('click', '.close_modal', function(event) {
		$('#cleanCandidatesSuccess').modal('hide');
	});
</script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
</html>