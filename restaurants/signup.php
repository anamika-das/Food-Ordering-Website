<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Restaurants | Food Shala</title>
 	
    <?php include('../admin/header.php'); ?>
    <?php include('../admin/db_connect.php'); ?>
</head>
<body>
<main id="main" class=" bg-dark">
    <div id="login-left">
        <div class="logo">
            <img src="../assets/img/sample_logo.png" alt="">
        </div>
    </div>
    <div id="login-right">
            <div class="card col-md-8">
                <div class="card-body">
                    <form action="" id="signup-frm">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Restaurants SignUp</h1>
                        <div class="form-group">
                            <label for="" class="control-label">Name</label>
                            <input type="text" name="name" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Email</label>
                            <input type="email" name="email" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Password</label>
                            <input type="password" name="password" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Contact</label>
                            <input type="text" name="contact" required="" class="form-control">
                            <small><a href="login.php" id="new_account">Alrady have acccount</a></small>
                        </div>                      
                        <input type="hidden" id="type" name="type" value="2" class="form-control">
                        <div class="text-center mt-2">
                            <button class="button btn btn-info btn-sm">Create</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</main>
</body>
<style>
#uni_modal .modal-footer{
	display:none;
}
</style>
<script>
$('#signup-frm').submit(function(e){
	e.preventDefault()
	$('#signup-frm button[type="submit"]').attr('disabled',true).html('Saving...');
	if($(this).find('.alert-danger').length > 0 )
		$(this).find('.alert-danger').remove();
	$.ajax({
		url:'../admin/ajax.php?action=signup3',
		method:'POST',
		data:$(this).serialize(),
		error:err=>{
			console.log(err)
			$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
		},
		success:function(resp){
			if(resp == 1){
				location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
			}else{
				$('#signup-frm').prepend('<div class="alert alert-danger">Email already exist.</div>')
				$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
			}
		}
	})
})
</script>
</html>