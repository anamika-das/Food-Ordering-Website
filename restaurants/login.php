<?php session_start();
if(isset($_SESSION['rlogin_id']))
	header("location:index.php?page=home");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Restaurants | Food Shala</title>
 	
<?php include('header.php'); ?>
<?php include('../admin/db_connect.php'); ?>
<?php 
$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}
?>
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
  					<form id="login-form" >
					  	<h1 class="h3 mb-3 font-weight-normal text-center">Restaurants Login</h1>
  						<div class="form-group">
  							<label for="username" class="control-label">Email</label>
  							<input type="text" id="username" name="email" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
							<small><a href="signup.php" id="new_account">Create New Account</a></small>
  						</div>
						<input type="hidden" id="type" name="type" value="2" class="form-control">
						<div class="text-center mt-2">
						  <button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button>
						</div>
  					</form>
  				</div>
  			</div>
  		</div>
	</main>
</body>

<script>
$('#login-form').submit(function(e){
	e.preventDefault()
	$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
	if($(this).find('.alert-danger').length > 0 )
		$(this).find('.alert-danger').remove();
	$.ajax({
		url:'../admin/ajax.php?action=login3',
		method:'POST',
		data:$(this).serialize(),
		error:err=>{
			console.log(err)
			$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
		},
		success:function(resp){
			if(resp == 1){
				location.href = 'index.php?page=home';
			}else{
				$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
			}
		}
	})
})
</script>
	
</html>