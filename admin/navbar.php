<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar collapse">
  <div class="position-sticky pt-3">
    <hr>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="index.php?page=home" class="nav-link text-white nav-home" aria-current="page"><i class="fa fa-home"></i> Home</a>
      </li>
      <li class="nav-item">
        <a href="index.php?page=orders" class="nav-link text-white nav-orders"><i class="fa fa-utensils"></i></span> Orders</a>
      </li>
      <li class="nav-item">
        <a href="index.php?page=categories" class="nav-link text-white nav-categories"><i class="fa fa-list"></i> Categories</a>
      </li>
      <li class="nav-item">
        <a href="index.php?page=users" class="nav-link text-white nav-users"><i class="fa fa-users"></i> Users</a>
      </li>
    </ul>
    <hr>
  </div>
</nav>
<script>
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').removeClass('text-white ')
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>