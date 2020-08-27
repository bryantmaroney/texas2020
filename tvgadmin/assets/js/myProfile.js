$(document).ready(function($) {
	$(document).on('click', '.myProfile', function(event) {
		$("#myProfile").fadeIn(300);
		$(".profile-slide-down").hide();
	});
	$(document).on('click', '.close_mannual_modal', function(event) {
		$("#myProfile").fadeOut(300);
		$('.admins  input').addClass('inactiveInput');
		$('.cencelAddAdminButton').trigger('click');
	});
	$(document).on('click', '.deleteAdmin', function(event) {
		var fname = $(this).parent().parent().find('.firstName > span').text();
		var lname = $(this).parent().parent().find('.lastName > span').text(); 
		var _this = $(this);


		swal({
			title: "Are you sure?",
			text: `Do you want to remove ${fname} ${lname}'s admin account?`,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: "No, cancel plx!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm){
		    if (isConfirm){

		    	$.ajax({
		    		url: site_url + 'admin/deleteAdminAccount',
		    		type: 'POST',
		    		data: {id: _this.parents('.adminSection').attr('adminID')},
		    		success:function(response){
				      swal("Deleted!", `${fname} ${lname}'s admin account has been deleted!`, "success");
				      _this.parent().parent().remove();		    			
		    		}
		    	})
		    } else {
		      swal("Cancelled", `${fname} ${lname}'s admin account is safe :)`, "error");
		    }
		});
	});

	$(document).on('input', '.updateAdminsPhoto', function(event) {
		var _this = $(this);
	    var formData = new FormData();
	      
	    formData.append('file', $(this)[0].files[0]); 
	    formData.append('id', $(this).parents('.adminSection').attr('adminID'));

		  $.ajax({
		      url: site_url + 'admin/update/adminsPhoto',
		      data: formData,
		      type: 'POST',
		      contentType: false, 
		      processData: false, 
		      success:function(response) {
		        _this.parents('.updAdPh').find('img').attr('src', response);
		      }
		  });
	});


	$(document).on('click', '.editAdmin', function(event) {
		$('.admins  input').addClass('inactiveInput');
		$(this).parent().parent().find('input').removeClass('inactiveInput');

		$(this).parents('.adminSection').find('.firstName').append('<input style="margin-top: 10px;" type="password" class="newAdminPassword" placeholder="Type password">');
		$(this).parents('.adminSection').find('.lastName').append('<input style="margin-top: 10px;" type="password" class="newAdminConfirmPassword" placeholder="Password confirm">');
		$(this).parents('.adminSection').find('.email').append(`
			<select class="adminType" style="margin-top: 10px;">
				<option value="0" selected>Admin</option>
				<option value="1">Super Admin</option>						
        	</select>
		`);


		$(this).removeClass('editAdmin');
		$(this).addClass('saveAdminNewData');

	});

	$(document).on('click', '.saveAdminNewData', function(event) {

		var data = {
			id: $(this).parents('.adminSection').attr('adminID'),
			first_name: $(this).parents('.adminSection').find('.newAdminFirstName').val(),
			last_name: $(this).parents('.adminSection').find('.newAdminLastName').val(),
			email : $(this).parents('.adminSection').find('.newAdminMail').val(),
			password : $(this).parents('.adminSection').find('.newAdminPassword').val(),
			confirmPassword : $(this).parents('.adminSection').find('.newAdminConfirmPassword').val(),
			adminType: $(this).parents('.adminSection').find('.adminType').val(),
		}
		var _this = $(this);
		
		$.ajax({
			url: site_url + 'edit/admins/data',
			type: 'POST',
			data: data,
			success:function(response){
				if (response == "error") {
					swal("Failed", `Please enter correct data for ${data.first_name} ${data.last_name} admin`, "error");
				}
				else {

					_this.removeClass('saveAdminNewData');
					_this.addClass('editAdmin');
					$('.admins  input').addClass('inactiveInput');

					_this.parents('.adminSection').find('.firstName').find('.newAdminPassword').remove();
					_this.parents('.adminSection').find('.lastName').find('.newAdminConfirmPassword').remove();
					_this.parents('.adminSection').find('.adminType').remove();



					swal("Updated!", `${data.first_name} ${data.last_name}'s accound data has been successfully updated`, "success");
				}
			}
		})
	});

	$(document).on('click', '.editAdminData', function(event) {
		var firstName = $(".editAdminsFirstName").val();
		var lastName = $(".editAdminsLastName").val();
		var email = $(".editAdminsEmail").val();
		var password = $(".editAdminsPassword").val();
		var confirmPassword = $(".editAdminsConfirmPassword").val();



		$.ajax({
			url: site_url + 'admin/editAdminData',
			type: 'POST',
			data: { firstName, lastName, email, password, confirmPassword },
			success:function(response) {	
				$('.errorShow').remove();	
				try {
			        response = JSON.parse(response);

			        for(let key in response){
			        	let className = key.charAt(0).toUpperCase() + key.slice(1)
			        	if (response[key] != "") {
			        		$(`.editAdmins${className}`).parent().after(`<div class="errorShow">${response[key]}</div>`)
			        	}
			        }

			    } catch (e) {
			        swal("Updated!", `Your data has been successfully updated!`, "success");
			    }
			}
		})
	});


	$(document).on('input', '#changeMyAdminPhoto', function(event) {
		var _this = $(this);
	    var formData = new FormData();
	      
	    formData.append('file', $(this)[0].files[0]); 

	      $.ajax({
	          url: site_url + 'admin/edit/adminAvatarPhoto',
	          data: formData,
	          type: 'POST',
	          contentType: false, 
	          processData: false, 
	          success:function(response) {
	            _this.parents('.myImage').find('img').attr('src', response);
	            $('.profileSlideDown').attr('src', response);
	          }
	      });
	});

	$(document).on('click', '.addAdmin', function(event) {
		$('.admins').prepend(`

			<div class="adminSection">
                <div class="updAdPh">
                	<label>
                		<img title="edit photo" src="${site_url}assets/images/defaultAdmin.png" alt="">
                	</label>         	
                </div>
                <div class="firstName password">
                	<input type="text" class="newAdminFirstName" value="Type first name" style="margin-bottom: 10px;">  
                	<input type="password" class="newAdminPassword" placeholder="Type password">               	
                </div>
                <div class="lastName confPass">
                	<input type="text" class="newAdminLastName" value="Type last name" style="margin-bottom: 10px;">
                	<input type="password" class="newAdminConfirmPassword" placeholder="Password confirm"> 
                </div>
                <div class="email"> 
                	<input class="newAdminMail"  type="text" value="Type email" style="margin-bottom: 10px;">
                	<select class="adminType">
						<option value="0" selected>Admin</option>
						<option value="1">Super Admin</option>						
                	</select>
                </div>
                <div class="editBut">
                    <button class="addAdminButton">Add</button>&nbsp;
                    <button class="cencelAddAdminButton">Cancel</button>
                </div>                
			</div>
		`);
	});

	$(document).on('click', '.addAdminButton', function(event) {
		var data = {
			first_name: $(this).parents('.adminSection').find('.newAdminFirstName').val(),
			last_name: $(this).parents('.adminSection').find('.newAdminLastName').val(),
			email : $(this).parents('.adminSection').find('.newAdminMail').val(),
			password : $(this).parents('.adminSection').find('.newAdminPassword').val(),
			confirmPassword : $(this).parents('.adminSection').find('.newAdminConfirmPassword').val(),
			adminType : $(this).parents('.adminSection').find('.adminType').val(),
		}
		var _this = $(this);

		$.ajax({
			url: site_url + 'admin/addAdmin',
			type: 'POST',
			data: data,
			success:function(id){

				if (id == "error") {
					swal("Failed", `Please enter correct data for new admin`, "error");
				}
				else {
					_this.parents('.editBut').append(`
						<img class="editAdmin" src="${site_url}assets/images/edit.png" title="edit admin" alt="">
	                    <img class="deleteAdmin" src="${site_url}assets/images/delete.png" title="delete admin" alt="">
					`);

					_this.parents('.adminSection').find('.updAdPh').append(`
						<span><input class="updateAdminsPhoto" type="file" id="uploadAdminPhoto${id}" style="display: none"></span>
					`);
					_this.parents('.adminSection').find('.updAdPh').find('label').attr('for', `uploadAdminPhoto${id}`);

					_this.parents('.admins').find('input').addClass('inactiveInput');



					_this.parents('.adminSection').find('.newAdminPassword').remove()

					_this.parents('.adminSection').find('.newAdminConfirmPassword').remove();

					_this.parents('.adminSection').find('.adminType').remove();



					_this.parents('.adminSection').attr('adminID', id);

					_this.parents('.editBut').find('.cencelAddAdminButton').remove();

					_this.remove();



					swal("Saved!", `${data.first_name} ${data.last_name}'s admin account has been saved successfully!`, "success");
				}


			}
		})
		
		
	});

	$(document).on('click', '.cencelAddAdminButton', function(event) {
		$(this).parents('.adminSection').remove();
	});
});



