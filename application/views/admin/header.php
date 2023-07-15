<?php  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/mainlogo.png">
  <title>Pondok Maharani</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_umum.css">

    <!-- Load File jquery.min.js yang ada difolder js -->
  <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
  
  <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>


</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-teal navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


        </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url(); ?>dashboard" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/img/mainlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pondok Maharani</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item"> 
              <a href="<?php echo base_url('dashboard'); ?>" class="nav-link ">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
              </a>
                </li>

                <li class="nav-item"> 
              <a href="" class="nav-link ">
                <i class="nav-icon fas fa-hotel"></i>
                <p>Kelola Kostel</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('pemesanan'); ?>" class="nav-link">
                    <i class="fas fa-book nav-icon"></i>
                    <p>Reservasi Kamar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('checkinout'); ?>" class="nav-link">
                    <i class="far fa-calendar nav-icon"></i>
                    <p>Check In & Check Out</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('statuspemesanan'); ?>" class="nav-link">
                    <i class="fas fa-info-circle nav-icon"></i>
                    <p>Status Pemesanan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('laundry'); ?>" class="nav-link">
                    <i class="fa fa-tshirt nav-icon"></i>
                    <p>Laundry</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('kendaraan'); ?>" class="nav-link">
                    <i class="fa fa-car nav-icon"></i>
                    <p>Kendaraan Tamu</p>
                  </a>
                </li>
              </ul>
                </li>

                <li class="nav-item"> 
              <a href="" class="nav-link ">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>Pembayaran</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('pembayaran'); ?>" class="nav-link">
                    <i class="fas fa-coins nav-icon"></i>
                    <p>Pembayaran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('detailpembayaran'); ?>" class="nav-link">
                    <i class="fas fa-receipt nav-icon"></i>
                    <p>Detail Pembayaran</p>
                  </a>
                </li>
              </ul>
                </li>
                
                <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>
                  Data Kamar
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('kamar'); ?>" class="nav-link">
                    <i class="fas fa-bed nav-icon"></i>
                    <p>Kamar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('tipekamar'); ?>" class="nav-link">
                    <i class="fas fa-bed nav-icon"></i>
                    <p>Tipe Kamar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('fotokamar'); ?>" class="nav-link">
                    <i class="fas fa-image nav-icon"></i>
                    <p>Upload Foto Kamar</p>
                  </a>
              </ul>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Profil
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('akun'); ?>" class="nav-link">
                    <i class="fas fa-key nav-icon"></i>
                    <p>Akun</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('tamu'); ?>" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Profil Tamu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('pegawai'); ?>" class="nav-link">
                    <i class="fas fa-user-secret nav-icon"></i>
                    <p>Profil Pegawai</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
             <a href="<?php echo base_url("login/logout"); ?>" class="nav-link">
               <i class="nav-icon fas fa-sign-out-alt"></i>
               <p>
                 Logout
               </p>
             </a>
           </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>