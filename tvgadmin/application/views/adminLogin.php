<title>TVG Admin</title>
<link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/adminLogin.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-4.min.css">


<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <h3>Admin login</h3>
    </div>
    <?php if (!empty($this->session->flashdata('admin_login_error'))) { ?>
		<p class="errorMessage"><?php echo $this->session->flashdata('admin_login_error') ?></p>	
    <?php } ?>

    <form action="<?php echo base_url() ?>admin/login" method="POST">
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="email" value="<?php echo $this->session->flashdata('email') ?>">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="<?php echo base_url() ?>admin/reset/password">Forgot Password?</a>
    </div>

  </div>
</div>

 <div class="modal fade" id="resetPassword" data-backdrop="static">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <div class="modal-body modalContainer" style="width: 100%;">

          <div class="row" style="padding: 20px 20px 0 10px; display: flex; justify-content: flex-end;">

            <span class="close_modal_btn"><img src="<?php echo base_url(); ?>assets/images/close-icon.png" style="cursor: pointer;" /></span>

          </div>

          <div class="row verificationMessage" style="padding: 20px;display: flex;justify-content: center;font-size: 20px;color: #233F78">

            <p>Would you like to continue or return to the main site?</p>

          </div> 

        </div>

      </div>
    </div>
 </div>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-4.min.js"></script>
<script>
	var site_url = "<?php echo base_url() ?>";
		
	if (location.href.includes('verify_success')) {
	    window.history.pushState('', '', `${site_url}admin`);
	    $('#resetPassword').find('.verificationMessage').find('p').html('Your password has been successfully reset! You may now sign in.')
	    $('#resetPassword').modal('show');
	}
	else if (location.href.includes('verify_error')) {
	    window.history.pushState('', '', `${site_url}admin`)
	    $('#resetPassword').find('.verificationMessage').find('p').html('The link you clicked does not appear to be authentic. Please click the link that was sent to the email address you entered.')
	    $('#resetPassword').modal('show');
	}
	else if (location.href.includes('mail_sent')) {
	    window.history.pushState('', '', `${site_url}admin`)
	    $('#resetPassword').find('.verificationMessage').find('p').html('Thank you! Please check your email and click the link received.')
	    $('#resetPassword').modal('show');
	}

	setTimeout(function() {
	  $('#resetPassword').modal('hide');
	},3000)
</script>