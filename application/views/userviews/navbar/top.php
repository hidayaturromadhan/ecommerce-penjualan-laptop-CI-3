<body>
  <!-- HEADER -->
  <header>
    <!-- TOP HEADER -->
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-left">
          <li><a href="#"><i class="fa fa-phone"></i> +62 857-3867-9367</a></li>
          <li><a href="#"><i class="fa fa-envelope-o"></i> comtinue@email.com</a></li>
          <li><a href="#"><i class="fa fa-map-marker"></i> Universitas Internasional Batam</a></li>
        </ul>
        <ul class="header-links pull-right">
          <!-- Menampilkan tombol berdasarkan status login -->
          <?php if ($this->session->userdata('logged_in')): ?>
            <li><a href="<?php echo base_url('user/profile'); ?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username'); ?></a></li>
            <li><a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
          <?php else: ?>
            <li><a href="<?php echo base_url('user/login'); ?>"><i class="fa fa-user-o"></i> Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- LOGO -->
          <div class="col-md-3">
            <div class="header-logo">
              <a href="<?php echo base_url('user'); ?>" class="logo">
                <img src="<?php echo base_url('assets/userassets/'); ?>img/logocom.png" alt="">
              </a>
            </div>
          </div>
          <!-- /LOGO -->

          <!-- SEARCH BAR -->
          <div class="col-md-6">
              <div class="header-search">
                  <form action="<?php echo base_url('user/search'); ?>" method="get">
                      <select class="input-select" name="brand">
                          <option value="0">All Brand</option>
                          <option value="lenovo">Lenovo</option>
                          <option value="asus">Asus</option>
                          <option value="hp">HP</option>
                          <option value="acer">Acer</option>
                          <option value="msi">MSI</option>
                      </select>
                      <input class="input" name="query" placeholder="Search here" type="text">
                      <button class="search-btn" type="submit">Search</button>
                  </form>
              </div>
          </div>


          <!-- ACCOUNT -->
          <div class="col-md-3 clearfix">
            <div class="header-ctn">
              <?php if ($this->session->userdata('logged_in')): ?>
                <!-- Keranjang -->
                <div class="dropdown">
                  <a href="<?php echo base_url('/cart'); ?>" class="dropdown-toggle" aria-expanded="true">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Your Cart</span>
                  </a>
                </div>
                <!-- Profil -->
                <div class="dropdown">
                  <a href="<?php echo base_url('user/profile'); ?>" class="dropdown-toggle" aria-expanded="true">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                  </a>
                </div>
              <?php else: ?>
                <!-- Jika belum login, hanya tombol Login yang muncul -->
                <div class="dropdown">
                  <a href="<?php echo base_url('user/login'); ?>" class="dropdown-toggle" aria-expanded="true">
                    <i class="fa fa-sign-in"></i>
                    <span>Login</span>
                  </a>
                </div>
              <?php endif; ?>

              <!-- Menu Toogle -->
              <div class="menu-toggle">
                <a href="#">
                  <i class="fa fa-bars"></i>
                  <span>Menu</span>
                </a>
              </div>
              <!-- /Menu Toogle -->
            </div>
          </div>
          <!-- /ACCOUNT -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
  </header>
  <!-- /HEADER -->
</body>
