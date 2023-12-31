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
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/mainlogo.png">
  <title>Pondok Maharani</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/slick/slick.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user.css">
  <script src="https://kit.fontawesome.com/a135730095.js" crossorigin="anonymous"></script>
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 JS-->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
  <!-- Header Section -->
  
  <header >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php base_url('landing') ?>">
      <img src="<?php echo base_url(); ?>assets/img/mainlogo.png" alt="Pondok Maharani Logo" style="width:40px;" class="rounded-pill">
      <span class="brand-text font-weight-light">Pondok Maharani</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('landing') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#facilities">Fasilitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#products">Pesan Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item" id="login-btn">
          <a class="nav-link btn-small btn-success" style="border-radius:20px;" href="<?php echo base_url('login') ?>">Login</a>
        </li>
        <li class="nav-item dropdown user-dropdown" id="user-dropdown" >
          <i class="fa fa-user-circle-o nav-icon" ></i>
          <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdownMenu" 
          data-bs-toggle="dropdown" data-display="static" data-boundary="scrollParent">
          <span><?php echo $this->session->userdata('username'); ?></span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url('profil') ?>">Profil</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('riwayat') ?>">Riwayat Pemesanan</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('login/logout') ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>  
</nav>
</header>
<div class="main-wrapper">
 <main>