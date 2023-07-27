  <!-- Carousel Section -->
  <section id="home">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo base_url(); ?>assets/img/carousel-1.jpg" class="d-block w-100" alt="Image 1">
          <div class="carousel-caption">
          <h1>Selamat Datang di <br>Pondok Maharani Syariah</h1>
          <p>Pondok Maharani merupakan layanan penyedia hotel dan kost syariah.
            Harap bagi pasangan membawa kartu nikah atau keluarga sebagai bukti.
          </p>
        </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url(); ?>assets/img/carousel-2.jpg" class="d-block w-100" alt="Image 2">
          <div class="carousel-caption">
          <h1>Welcome to Our Website</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url(); ?>assets/img/carousel-3.jpg" class="d-block w-100" alt="Image 3">
          <div class="carousel-caption">
          <h1>Welcome to Our Website</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <!-- Facilities Section -->
  <section id="facilities" class="py-5">
    <div class="container">
        <h1>Fasilitas Pondok Maharani</h1>
      <div class="row">
        <div class="col-md-6 order-md-1 order-2">
          <!-- Facility Item 1 -->
          <div class="facility-item">
            <img src="<?php echo base_url(); ?>assets/img/fasilitas-outdoor.jpg" alt="Facility 1">
            <h4>Ruang Outdoor</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <!-- Facility Item 2 -->
          <div class="facility-item">
            <img src="<?php echo base_url(); ?>assets/img/fasilitas-laundry.jpg" alt="Facility 2">
            <h4>Layanan Laundry</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="col-md-6 order-md-2 order-1">
          <!-- Facility Item 3 -->
          <div class="facility-item">
            <img src="<?php echo base_url(); ?>assets/img/fasilitas-dapur-umum.jpg" alt="Facility 3">
            <h4>Dapur Bersama</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <!-- Facility Item 4 -->
          <div class="facility-item">
            <img src="<?php echo base_url(); ?>assets/img/fasilitas-mushola.jpg" alt="Facility 4">
            <h4>Mushola</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Product Card Section -->
<section id="products" class="bg-light py-5">
    <div class="container">
        <div class="row">
        <?php 
                $processed_ids = array(); // Array sementara untuk menyimpan id_tipe_kamar yang sudah diproses
                foreach ($products as $product):
            ?>
                <?php 
                    // Cek apakah id_tipe_kamar sudah diproses atau belum
                    if (!in_array($product['id_tipe_kamar'], $processed_ids)):
                        $processed_ids[] = $product['id_tipe_kamar']; // Tandai id_tipe_kamar sebagai sudah diproses
                ?>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-img-slider slider-products" data-id="<?php echo $product['id_tipe_kamar']; ?>">
                            <?php foreach ($product['images'] as $image): ?>
                                <div>
                                    <img src="uploads/foto_kamar/<?php echo $image['deskripsi_foto']; ?>" alt="<?php echo $product['nama_tipe_kamar']; ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['nama_tipe_kamar']; ?></h5>
                            <p class="card-text"><?php echo $product['fasilitas']; ?></p>
                            <!-- Tambahkan link "Buy Now" dengan query parameter id_tipe_kamar -->
                            <a href="<?php echo site_url('Reservation/pesan').'?id_tipe_kamar='.$product['id_tipe_kamar']; ?>" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div> 
                <?php endif; ?> 
            <?php endforeach; ?>
        </div>
    </div>
</section>




  <!-- About Us Section -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>About Us</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget libero a arcu tincidunt blandit.
            Suspendisse potenti. Sed non varius nisi. Ut hendrerit, elit at euismod tempus, dui tellus laoreet
            turpis, sit amet bibendum ligula felis at tellus.</p>
        </div>
        <div class="col-md-6">
          <!-- Add an image here for About Us section -->
          <img src="<?php echo base_url(); ?>assets/img/mainlogo.png" class="img-fluid" alt="About Us Image">
        </div>
      </div>
    </div>
  </section>

