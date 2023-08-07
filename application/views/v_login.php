<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Pendaftaran</title>
  <!-- Load Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <!-- Load custom CSS -->
<style>
	/* ... */
body {
  background-color: #f8f9fa;
}

.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.logo-img {
  display: block;
  margin: 0 auto 20px;
  max-width: 150px;
  height: auto;
}

.form-group {
  margin-bottom: 20px;
}

.btn-primary {
  width: 100%;
}

#loginForm .btn-primary {
  width: 100%;
}

.has-error .form-control {
  border-color: #dc3545;
}

.error-msg {
  color: #dc3545;
  font-size: 14px;
  margin-top: 5px;
}
/* ... */

</style>
</head>
<body>
 <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <img src="<?php echo base_url(); ?>assets/img/mainlogo.png" alt="Logo Perusahaan" class="logo-img">
            <h2 class="card-title mb-4">Halaman Login</h2>
            <?php if ($this->session->flashdata('message')): ?>
                      <?php echo $this->session->flashdata('message'); ?>
            <?php endif; ?>
            <form id="loginForm" action="<?php echo base_url("login"); ?>" method="post">
              <div class="form-group">
                <label for="username">Username atau Email</label>
                <input type="text" name="USERNAME" id="username" class="form-control" placeholder="Username or Email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="PASSWORD" id="password" class="form-control" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="mt-3">Belum memiliki akun? <a href="<?php echo base_url("login/forgotPassword"); ?>">Daftar</a></p>
            <br>
            <p class="mt-3">Lupa Password ? <a href="<?php echo base_url("daftar"); ?>">Klik disini</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Load Bootstrap JS and jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/popper/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <!-- Load custom JavaScript -->
  <script>
    $(document).ready(function() {
  // Validasi form login
  $("#loginForm").submit(function(event) {

    // Reset pesan error
    $(".form-group").removeClass("has-error");
    $(".error-msg").remove();

    // Ambil nilai input
    var usernameOrEmail = $("#username").val();
    var password = $("#password").val();

    // Lakukan validasi sederhana
    if (usernameOrEmail.trim() === "") {
      showError($("#username"), "Username atau Email tidak boleh kosong.");
    }

    if (password.trim() === "") {
      showError($("#password"), "Password tidak boleh kosong.");
    }

    // Jika tidak ada error, simulasi proses login (pada aplikasi nyata, kirim data ke server)
    if ($(".error-msg").length === 0) {
      // Simulasi proses login
      setTimeout(function() {
        loginSuccess();
      }, 3000);
    }
  });

  // Fungsi untuk menampilkan pesan error
  function showError(input, message) {
    input.closest(".form-group").addClass("has-error");
    input.after('<div class="error-msg">' + message + '</div>');
  }

  // Fungsi untuk menampilkan pesan sukses setelah login
  function loginSuccess() {
    $("#loginForm").hide();
    $(".card-body").append('<div class="alert alert-success mt-3">Login berhasil!</div>');
  }
});

  </script>

</body>
</html>
