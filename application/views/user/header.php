<?php
if ($this->session->userdata('role')) {
  $id_akun_session = $this->session->userdata('id_akun');
  $username_session = $this->session->userdata('username');
  $email_session = $this->session->userdata('email');
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page Template</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
</head>

<body>
  <!-- Header Section -->
  
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Pondok Maharani</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#facilities">Fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#products">Reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <!-- Add more navigation items as needed -->
          <!-- Login -->
          <li class="nav-item" id="login-btn">
          <a class="nav-link" href="<?php base_url('login') ?>" >Login</a>
        </li>
        <li class="nav-item" id="user-dropdown" style="display: none;">
          <a class="nav-link dropdown-toggle" href="" role="button" id="userDropdownMenu" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('username'); ?></a>
          <div class="dropdown-menu" aria-labelledby="userDropdownMenu">
            <a class="dropdown-item" href="">Profil</a>
            <a class="dropdown-item" href="">Pemesanan</a>
            <a class="dropdown-item" href="">Pembayaran</a>
          </div>
        </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="main-wrapper">
   <main>