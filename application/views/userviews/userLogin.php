<!-- File: application/views/userviews/userLogin.php -->
<body>
  <h2>Welcome to Comtinue!</h2>
  <div class="container" id="container">
    <div class="form-container sign-in-container">
      <!-- Formulir Login -->
      <form action="<?php echo site_url('user/login'); ?>" method="POST">
        <h1>Log In</h1>

        <!-- Menampilkan pesan error jika login gagal -->
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <!-- Input untuk Username -->
        <input type="text" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" required />
        <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>

        <!-- Input untuk Password -->
        <input type="password" name="password" placeholder="Password" required />
        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>

        <!-- Tautan ke halaman registrasi jika belum memiliki akun -->
        <a href="<?php echo site_url("user/register"); ?>">Belum Punya Akun?</a>

        <!-- Tombol untuk submit form login -->
        <button type="submit">Log In</button>
      </form>
    </div>
    
    <!-- Overlay -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1 style="color: white;">Hello, Comians!</h1>
          <p>Enter your personal details and start your journey with us</p>
        </div>
      </div>
    </div>
  </div>
</body>
