
<body>
  <h2>Welcome to Comtinue!</h2>
  <div class="container" id="container">
    <div class="form-container sign-in-container">
      <!-- Formulir Registrasi -->
      <form action="<?php echo site_url('user/register'); ?>" method="POST">
        <h1>Register</h1>

        <!-- Menampilkan pesan error jika registrasi gagal -->
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <!-- Menampilkan pesan sukses jika registrasi berhasil -->
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>

        <!-- Input untuk Nama -->
        <input type="text" name="nama" placeholder="Nama" value="<?php echo set_value('nama'); ?>" required />
        <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>

        <!-- Input untuk Username -->
        <input type="text" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" required />
        <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>

        <!-- Input untuk Password -->
        <input type="password" name="password" placeholder="Password" required />
        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>

        <!-- Input untuk Confirm Password -->
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        <?php echo form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>

		<a href="<?php echo site_url("user/login"); ?>">Sudah Punya Akun?</a>

        <!-- Tombol untuk submit form registrasi -->
        <button type="submit">Register</button>
      </form>
    </div>
    
    <!-- Overlay -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1 style="color: white;">Welcome to Comtinue!</h1>
          <p>Enter your personal details and start your journey with us</p>
        </div>
      </div>
    </div>
  </div>
</body>
