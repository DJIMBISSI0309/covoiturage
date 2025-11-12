$(document).ready(function() {
	// main menu
	// $("#navSetting").addClass('active');
	// // sub manin
	// $("#topNavSetting").addClass('active');

	// change username
	// $("#changeUsernameForm").unbind('submit').bind('submit', function() {
	$("#changeUsernameForm").unbind('submit').bind('submit', function() {
		var form = $(this);
         var $btn= $('#changeUsernameBtn');
		var username = $("#username").val();
		var prenom = $("#prenom").val();
		var email = $("#email").val();
		var numero = $("#numero").val();
		
		if(username == "" || prenom=="" || email=="" || numero=="") {
			if(username==""){
			$("#username").after('<p class="text-danger">Le  nom est obligatoire</p>');
			$("#username").closest('.form-group').addClass('has-error');
		} else {
			$("#username").closest('.form-group').removeClass('has-error');
			$(".text-danger").remove();
		}
		if(prenom==""){
			$("#prenom").after('<p class="text-danger">Le  prenom est obligatoire</p>');
			$("#prenom").closest('.form-group').addClass('has-error');
		} else {
			$("#prenom").closest('.form-group').removeClass('has-error');
			$(".text-danger").remove();
		}
		if(email==""){
			$("#email").after('<p class="text-danger">L\'email est obligatoire</p>');
			$("#email").closest('.form-group').addClass('has-error');
		} else {
			$("#email").closest('.form-group').removeClass('has-error');
			$(".text-danger").remove();
		}
		if(numero==""){
			$("#numero").after('<p class="text-danger">Le  numero est obligatoire</p>');
			$("#numero").closest('.form-group').addClass('has-error');
		} else {
			$("#numero").closest('.form-group').removeClass('has-error');
			$(".text-danger").remove();
		}
		
	}else{
			$(".text-danger").remove();
			$('.form-group').removeClass('has-error');

			$btn.text('chargement...').prop('disabled',true).addClass('disabled');

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {

					$btn.text('soumettre').prop('disabled',false).removeClass('disabled');
					// remove text-error 
					$(".text-danger").remove();
					// remove from-group error
					$(".form-group").removeClass('has-error').removeClass('has-success');

					if(response.success == true)  {												
																
						// shows a successful message after operation
						$('.changeUsenrameMessages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="fa fa-ok-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          					
						
					} else {
						// shows a successful message after operation
						$('.changeUsenrameMessages').html('<div class="alert alert-warning">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="fa fa-exclamation-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-warning").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          					
					}
				} // /success 
			}); // /ajax
		}
			
		return false;
	
	});

	$("#changePasswordForm").unbind('submit').bind('submit', function() {

		var form = $(this);

		$(".text-danger").remove();

		var currentPassword = $("#password").val();
		var newPassword = $("#npassword").val();
		var conformPassword = $("#cpassword").val();

		if(currentPassword == "" || newPassword == "" || conformPassword == "") {
			if(currentPassword == "") {
				$("#password").after('<p class="text-danger">Le  mot de passe actuel est obligatoire</p>');
				$("#password").closest('.form-group').addClass('has-error');
			} else {
				$("#password").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

			if(newPassword == "") {
				$("#npassword").after('<p class="text-danger">le  nouveau mot de passe est obligatoire</p>');
				$("#npassword").closest('.form-group').addClass('has-error');
			} else {
				$("#npassword").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

			if(conformPassword == "") {
				$("#cpassword").after('<p class="text-danger">La   confirmation mot de passe est obligatoire</p>');
				$("#cpassword").closest('.form-group').addClass('has-error');
			} else {
				$("#cpassword").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}
		} else {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					console.log(response);
					if(response.success == true) {
						$('.changePasswordMessages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="fa fa-ok-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	    
					} else {

						$('.changePasswordMessages').html('<div class="alert alert-warning">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="fa fa-exclamation-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-warning").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          	
					}
				} // /success function
			}); // /ajax function

		} // /else


		return false;
	});
}); // /document