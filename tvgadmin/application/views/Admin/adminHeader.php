<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<!-- Disable caching -->
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0"/>

      <link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/admin.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>

	<!-- Data tablw -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/> -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/datatables.min.css"/>

	<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script> -->
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>

      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/natural_sorting.js"></script>
	
    	<!-- <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-337.min.css"/>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/> -->
      <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/dataTables.bootstrap.min.css"/> -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/rangeslider.css">
	
	<script src="<?php echo base_url() ?>assets/js/search.js"></script>
	<script src="<?php echo base_url() ?>assets/js/myProfile.js"></script>

	<!-- alert -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sweetalert.min.css">
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
      <script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>

  	<!-- <link rel="stylesheet" href="https://use.typekit.net/wks2sii.css"> -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/typekit.css">

      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/lazy_load.js"></script>

</head>
<body>
	<div class="adminHeaderContainer">
		<div class="dashboardTitle">
			<a href="<?php echo base_url() ?>admin">Dashboard</a>
		</div>
		<div class="dashSect">
			<!-- <div class="search">
				<i class="fas fa-sort-down inputSearchSlideDown"></i>
				<input placeholder="Search here" readonly="" search="candidates">
				<i id="searchIcone" class="fas fa-search searchIcon"></i>
				<div class="chooseSearchType" style="display: none;">
					<div search="candidates">CANDIDATES</div>
					<div search="voters">VOTERS</div>
				</div>
			</div> -->
			<div class="dash-header-icon">
				<a href="<?php echo base_url() ?>admin/edit-video-links" title="Edit video links"><i class="fas fa-film"></i></a>
			</div>
			<div class="dash-header-icon">
				<i class="far fa-bell"></i>
			</div>
			<div class="dash-header-icon">
				<i class="far fa-envelope"></i>
			</div>
			<div class="profile">
				<img class="profileSlideDown" src="<?php echo $admin['image'] ?>" alt="image">
				<i class="fas fa-sort-down profileSlideDown"></i>
				<div class="profile-slide-down" style="display: none">
                              <div class="myProfile"><img src="<?= base_url() ?>assets/images/profile-icon.png" alt="profile"> My Profile</div>
                              <?php if($admin['super_admin']) { ?>
                                    <div>
                                          <Label for="uploadCandidates" class="import-candidates">Import candidates</label>
                                          <input type="file" id="uploadCandidates" class="impot-hidden">
                                    </div>
                              <?php } ?>
                              <div><img src="<?= base_url() ?>assets/images/logout-icon.png" alt="logout"><a style="text-decoration: none; cursor: pointer; color: #585858; " href="<?php echo base_url() ?>/admin/logout">Logout</a></div>
                        </div>
			</div>
		</div>
	</div>

	<div class="modalManually" id="myProfile" style="display: none">
      <div class="manuallyContainer">
          <div class="row" style="padding: 1px 15px 0 10px; display: flex; justify-content: flex-end;">
              <span class="close_mannual_modal"><img src="<?php echo base_url(); ?>assets/images/close-icon.png"  alt="close" style="cursor: pointer;" /></span>
          </div>
          <div class="row editContainer">
            <h4 class="editTitlts">My data</h4>
            <div class="editMyData">
            	<div class="myData">
            		<div>
                              <div>
                  			<label for="">First Name</label>
                  			<input class="editAdminsFirstName" type="text" value="<?php echo $admin['first_name'] ?>" placeholder="first name...">
                              </div>
            		</div>
            		<div>
                              <div>
                  			<label for="">Last Name</label>
                  			<input class="editAdminsLastName" type="text" value="<?php echo $admin['last_name'] ?>" placeholder="last name...">                                    
                              </div>
            		</div>
                        <div>
                              <div>
                                    <label for="">Email</label>
                                    <input class="editAdminsEmail" type="text" value="<?php echo $admin['email'] ?>" placeholder="email...">                                    
                              </div>
                        </div>
            		<div>
                              <div>
                  			<label for="">Password</label>
                  			<input class="editAdminsPassword" type="password" placeholder="password...">                                    
                              </div>
            		</div>
                        <div>
                              <div>
                                    <label for="">Password confirm</label>
                                    <input class="editAdminsConfirmPassword" type="password" placeholder="password confirm...">                                    
                              </div>
                        </div>
            		<div>
            			<button class="editAdminData">Submit</button>
            		</div>
            	</div>
            	<div class="myImage">
            		<img src="<?php echo $admin['image'] ?>" alt="">
            		<label for="changeMyAdminPhoto">Change photo</label>
            		<input style="display: none" type="file" id="changeMyAdminPhoto" />
            	</div>
            </div>
            <div style="text-align: right;cursor: pointer;">
                  <h4 class="editTitlts">Admins</h4>
                  <?php if ($admin['super_admin'] == "1") { ?>
                        <i class="fas fa-plus addAdmin"></i>     
                  <?php } ?>
            </div>
            <div class="admins">
                  <?php foreach ($admins as $key => $adm) { ?>
                  	<div class="adminSection" adminID="<?= $adm['id'] ?>">
                  		<div class="updAdPh">
                  			<label for="uploadAdminPhoto<?= $adm['id'] ?>">
                  				<img title="edit photo" src="<?= $adm['image'] ?>" alt="">
                  			</label>
                  			<span><input class="updateAdminsPhoto" type="file" id="uploadAdminPhoto<?= $adm['id'] ?>" style="display: none"></span>
                  		</div>
                  		<div class="firstName">
                  			<input class="inactiveInput newAdminFirstName" type="text" value="<?= $adm['first_name'] ?>">
                  			
                  		</div>
                  		<div class="lastName">
                  			<input class="inactiveInput newAdminLastName" type="text" value="<?= $adm['last_name'] ?>">
                  		</div>
                  		<div class="email"> 
                  			<input class="inactiveInput newAdminMail" type="text" value="<?= $adm['email'] ?>">
                  		</div>
                              <?php if ($admin['super_admin'] == "1") { ?>
                        		<div class="editBut">
                        			<img class="editAdmin" src="<?php echo base_url(); ?>assets/images/edit.png" title="edit admin" alt="">
                        			<img class="deleteAdmin" src="<?php echo base_url(); ?>assets/images/delete.png" title="delete admin" alt="">
                        		</div>
                              <?php } ?>
                  	</div>
                  <?php } ?>
            	
            </div>
          </div>
      </div>
</div>
	
