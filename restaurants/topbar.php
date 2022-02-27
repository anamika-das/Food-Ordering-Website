<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Restaurants</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <div class="btn-group">
      <button type="button" class="btn btn-sm text-white dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
      <?php echo $_SESSION['rlogin_name'] ?>
      </button>
      <ul class="dropdown-menu dropdown-menu-lg-start">
        <li><a class="dropdown-item" href="../admin/ajax.php?action=logout3">Logout</a></li>
      </ul>
    </div>
  </ul>
</header>