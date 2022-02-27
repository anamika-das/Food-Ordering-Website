<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if(!is_numeric($key))
    $_SESSION['setting_'.$key] = $value;
}
?>

<style>
div.cover {
  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

<body id="page-top">
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
<!-- Navigation-->
  <header class="p-3 fixed-top bg-dark text-white">
      <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a class="navbar-brand text-white" href="./"><?php echo $_SESSION['setting_name'] ?></a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="index.php?page=home" class="nav-link px-2 text-white">Home</a></li>
              <li><a href="index.php?page=cart_list" class="nav-link px-2 text-white position-relative">
              Cart <i class="fa fa-shopping-cart"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary item_count">0 </span></a></li>
              <?php if(isset($_SESSION['login_user_id'])): ?>
              <li><a href="index.php?page=orders" class="nav-link px-2 text-white">Orders</a></li>
              <?php endif; ?>
              <li><a href="index.php?page=about" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
            <?php if(isset($_SESSION['login_user_id'])): ?>
              <span><a class="text-white" href="admin/ajax.php?action=logout2"><?php echo "Welcome ". $_SESSION['login_first_name'].' '.$_SESSION['login_last_name'] ?> <i class="fa fa-power-off"></i></a></span>
            <?php else: ?>
              <a href="javascript:void(0)" id="login_now" class="btn btn-light me-2">Login</a>
              <a href="javascript:void(0)" class="btn btn-warning" id="new_account">Sign-up</a>
            <?php endif; ?>
            </div>
          </div>
      </div>
  </header>
<!-- cover -->
  <div class="cover px-4 pt-5 my-5 text-center border-bottom">
      <h1 class="display-4 fw-bold">Welcome to <?php echo $_SESSION['setting_name']; ?></h1>
      <div class="col-lg-6 mx-auto">
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            <a href="#menu" class="btn btn-warning btn-xl px-4">Order Now</a>
          </div>
      </div>
  </div>
       
  <?php 
  $page = isset($_GET['page']) ?$_GET['page'] : "home";
  include $page.'.php';
  ?>

  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-light py-5">
    <div class="container"><div class="small text-center text-muted">Copyright © 2021 - Shubham Khan | <a href="https://github.com/shubhamkhan" target="_blank">Source code</a></div></div>
  </footer> 

  <?php include('footer.php') ?>
  <?php $conn->close() ?>
</body>
</html>
