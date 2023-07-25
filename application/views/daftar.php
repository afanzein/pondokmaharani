<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Pendaftaran</title>
  <!-- Load Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Load custom CSS -->
  <style>
  body {
  background-color: #f8f9fa;
}

.container {
  background-color: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 20px;
}

.btn-primary {
  width: 100%;
}
#registrationForm .btn-primary {
  width: 100%;
}
/* Tambahkan gaya khusus jika ada error pada input */
.has-error .form-control {
  border-color: #dc3545;
}

.error-msg {
  color: #dc3545;
  font-size: 14px;
  margin-top: 5px;
}
  </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <img src="<?php echo base_url(); ?>assets/img/mainlogo.png" alt="Logo Perusahaan" class="logo-img">
            <h2 class="card-title mb-4">Pendaftaran Akun</h2>
            <form id="registrationForm" action="<?php echo base_url("daftar"); ?>" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Masukkan Username" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan Email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan Password" required>
              </div>
              <div class="form-group">
                <label for="retypePassword">Re-type Password</label>
                <input type="password" class="form-control" id="retypePassword" placeholder="Ketik Ulang Password" required>
              </div>
              <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
            <p class="mt-3">Sudah memiliki akun? <a href="<?php echo base_url("login"); ?>">Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Load Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Load custom JavaScript -->
  <script>
  $(document).ready(function() {
  // Validasi form pendaftaran
  $("#registrationForm").submit(function(event) {

    // Reset pesan error
    $(".form-group").removeClass("has-error");
    $(".error-msg").remove();

    // Ambil nilai input
    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var retypePassword = $("#retypePassword").val();

    // Lakukan validasi sederhana
    if (username.trim() === "") {
      showError($("#username"), "Username tidak boleh kosong.");
    }

    if (email.trim() === "") {
      showError($("#email"), "Email tidak boleh kosong.");
    } else if (!isValidEmail(email)) {
      showError($("#email"), "Email tidak valid.");
    }

    if (password.trim() === "") {
      showError($("#password"), "Password tidak boleh kosong.");
    }

    if (retypePassword.trim() === "") {
      showError($("#retypePassword"), "Ketik ulang password tidak boleh kosong.");
    } else if (password !== retypePassword) {
      showError($("#retypePassword"), "Password tidak cocok.");
    }

    // Jika tidak ada error, lanjutkan proses pendaftaran (pada aplikasi nyata, kirim data ke server)
    if ($(".error-msg").length === 0) {
      alert("Pendaftaran berhasil!");
      $("#registrationForm")[0].reset(); // Reset form setelah pendaftaran berhasil
    }
  });

  // Fungsi untuk menampilkan pesan error
  function showError(input, message) {
    input.closest(".form-group").addClass("has-error");
    input.after('<div class="error-msg">' + message + '</div>');
  }

  // Fungsi untuk memvalidasi email dengan menggunakan regular expression
  function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }
});

  </script>
</body>
</html>
