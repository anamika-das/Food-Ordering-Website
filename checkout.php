<div class="container" id="menu">
  <div class="row h-100 align-items-center justify-content-center text-center">
      <div class="align-self-end mb-4 page-title">
          <h3>Checkout</h3>
          <hr class="divider my-4" />
      </div>
  </div>
  <div class="row g-5">
    <div class="col-md-12 col-lg-8 offset-lg-2">
      <h4 class="mb-3">Billing address</h4>
      <form action="" id="checkout-frm">
        <div class="row g-3">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="" class="control-label">First Name</label>
              <input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="" class="control-label">Last Name</label>
              <input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="" class="control-label">Contact</label>
              <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_mobile'] ?>">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="" class="control-label">Address</label>
              <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="floatingSelect">Preferences</label>
              <select name="preferences" class="form-select" aria-label="Floating label select example">
                <option value="1"<?php if ($_SESSION['login_preferences'] == 1) echo ' selected="selected"'; ?>>Veg</option>
                <option value="2"<?php if ($_SESSION['login_preferences'] == 2) echo ' selected="selected"'; ?>>Non-veg</option>
              </select>
            <div>
          </div>

          <div class="col-12">
            <div class="form-group">
              <label for="" class="control-label">Email</label>
              <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_email'] ?>">
            </div> 
          </div>
          <hr class="my-4">
        <button class="btn btn-primary btn-lg w-100">Continue to checkout</button>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $('#checkout-frm').submit(function(e){
    e.preventDefault()
    start_load()
    $.ajax({
      url:"admin/ajax.php?action=save_order",
      method:'POST',
      data:$(this).serialize(),
      success:function(resp){
        if(resp==1){
            alert_toast("Order successfully Placed.")
            setTimeout(function(){
              location.replace('index.php?page=home')
            },1500)
        }
      }
    })
  })
})
</script>