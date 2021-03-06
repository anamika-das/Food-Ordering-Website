<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="signup-frm">
		<div class="form-group">
			<label for="" class="control-label">First Name</label>
			<input type="text" name="first_name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Last Name</label>
			<input type="text" name="last_name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="mobile" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="floatingSelect">Preferences</label>
			<select name="preferences" class="form-select" aria-label="Floating label select example">
				<option selected>Select</option>
				<option value="1">Veg</option>
				<option value="2">Non-veg</option>
			</select>
		<div>
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
		</div>
		<div class="text-center mt-2">
			<button class="button btn btn-info btn-sm">Create</button>
		</div>
	</form>
</div>

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
		url:'admin/ajax.php?action=signup2',
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