<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Pendaftaran</title>
  <!-- Load Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <!-- Load custom CSS -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
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

.card{
  margin:40px 50px;
  border : 1px solid #000;
  border-radius: 15px;
}


  </style>
</head>
<body>
<div class="container-fluid mt-12">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title mb-4 ">Ganti Password Akun</h2>
            <h5><?php $this->session->userdata('reset_email'); ?></h5>
            <?php if ($this->session->flashdata('message')): ?>
                      <?php echo $this->session->flashdata('message'); ?>
            <?php endif; ?>
            <form id="registrationForm" method="post" action="<?php echo base_url("login/ganti_password"); ?>">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru" required>
                </div>
                <div class="form-group">
                    <label for="retypePassword">Re-type Password</label>
                    <input type="password" class="form-control" id="retypePassword" name="retypePassword" placeholder="Ketik Ulang Password Baru" required>
                </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <?php if (isset($error_message)) : ?>
                <div class="alert alert-danger mt-3"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <p class="mt-3">Sudah memiliki akun? <a href="<?php echo base_url("login"); ?>">Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Load full version of jQuery -->
  <!-- Load Bootstrap JS and jQuery -->
  
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/popper/popper.min.js"></script>


  <script>
$(document).ready(function() {
  // Validasi form pendaftaran
  $("#registrationForm").submit(function(event) {

    // Reset pesan error
    $(".form-group").removeClass("has-error");
    $(".error-msg").remove();

    // Ambil nilai input
    var password = $("#password").val();
    var retypePassword = $("#retypePassword").val();

    if (password.trim() === "") {
      showError($("#password"), "Password tidak boleh kosong.");
    }

    if (retypePassword.trim() === "") {
      showError($("#retypePassword"), "Ketik ulang password tidak boleh kosong.");
    } else if (password !== retypePassword) {
      showError($("#retypePassword"), "Password tidak cocok.");
    }

    // Jika tidak ada error, kirim data ke server melalui AJAX
      // Jika tidak ada error, form akan melakukan submit secara langsung tanpa menggunakan AJAX
      if ($(".error-msg").length === 0) {
        // Form submission will happen naturally
        // The form will be submitted to the URL specified in the 'action' attribute
        // with the form fields and values.
      } else {
        // Prevent the default form submission if there are validation errors
        event.preventDefault();
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
