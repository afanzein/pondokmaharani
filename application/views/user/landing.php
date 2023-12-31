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
          <img src="<?php echo base_url(); ?>assets/img/carousel-1.jpg" class="d-block w-100" alt="Image 1" style="opacity:2.4">
          <div class="carousel-caption">
          <h1>Selamat Datang di <br><strong>Pondok Maharani Syariah</strong></h1>
          <hr>
          <p>Selamat datang di Pondok Maharani Syariah, destinasi akomodasi yang memberikan ketenangan dan kenyamanan 
            bagi Anda. Kami akan menyambut Anda dengan senyuman dan penuh keceriaan. Rasakan kenyamanan 
            suasana yang hangat dan layanan yang ramah sambil menikmati fasilitas unggulan kami!
          </p>
        </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url(); ?>assets/img/carousel-4.jpg" class="d-block w-100" alt="Image 2">
          <div class="carousel-caption">
          <h1>Mengapa harus <strong>Pondok Maharani Syariah</strong>?</h1>
          <p>Nikmati fleksibilitas harga istimewa di Pondok Maharani Syariah! rasakan 
            kemudahan menginap dengan penawaran yang menguntungkan. Harga fleksibel untuk Anda, 
            pesan sekarang dan nikmati pengalaman menginap yang tak terlupakan!
          </p>
        </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url(); ?>assets/img/carousel-6.jpg" class="d-block w-100" alt="Image 3">
          <div class="carousel-caption">
          <h1><strong> #StayHalal ! </strong></h1>
          <p>Kami berkomitmen mengutamakan prinsip syariah dan memastikan pengalaman menginap yang nyaman dan
             harmonis untuk semua tamu kami.Oleh karenanya kami mohon kepada pasangan untuk menyertakan bukti nikah 
             berupa buku nikah atau kartu keluarga saat melakukan proses check-in di lobi kami.Terima kasih atas kerjasama dan 
             pengertian Anda. Selamat menikmati momen berharga bersama kami di Pondok Maharani Syariah.</p>
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

  <section id="facilities" class="py-2">
  <div class="container">
    <h1 class="display-4 text-center">Fasilitas Kami</h1>
    <hr>
    <div class="row">
      <div class="col-lg-6">
        <div class="service-item">
          <i class="fa-solid fa-couch"></i>
          <h4>Ruang Outdoor</h4>
          <p>Nikmati momen santai di Ruang Outdoor kami, kami
             menyediakan isi ulang air, kursi yang panjang dan juga TV .</p>
        </div>
      </div>
      <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-tshirt"></i>
            <h4>Layanan Laundry</h4>
            <p>Kotoran pada pakaian tak lagi jadi masalah, rasakan kenyamanan tanpa repot dengan 
               Layanan Laundry berkualitas kami, pakaian Anda akan kembali segar dan bersih.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fa-solid fa-fire-burner"></i>
            <h4>Dapur Bersama</h4>
            <p>Tidak perlu repot, Anda dapat menggunakan Dapur Bersama kami, difasilitasi dengan alat
               dapur yang lengkap, Anda juga dapat menggunakan kulkas yang disediakan.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fa-solid fa-mosque"></i>
            <h4>Mushola</h4>
            <p>Kami menyediakan Mushola yang tenang dan nyaman, tempat sempurna untuk beribadah dan merenungkan kehidupan.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-wifi"></i>
            <h4>Wi-fi</h4>
            <p>Selalu terhubung dengan dunia di Wi-fi kami yang super cepat, nikmati koneksi lancar di seluruh area akomodasi kami.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fa-solid fa-square-parking"></i>
            <h4>Area Parkir</h4>
            <p>Kami memahami kebutuhan Anda akan kenyamanan, jadi nikmati kenyamanan parkir yang aman dan luas di Area Parkir kami.</p>
          </div>
        </div>
    </div>
  </div>
</section>

<!-- Product Card Section -->
<section id="products" class="bg-light py-5">
    <div class="container">
      <h1 class="text-center display-4">Pesan Kamar</h1>
      <hr>
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
                            <?php break; endforeach; ?>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title display-5 text-center"><?php echo $product['nama_tipe_kamar']; ?></h4>
                            <hr>
                            <p class="card-text"><?php echo $product['fasilitas']; ?></p>
                            <hr size="10px">
                            <table class="price-table">
                            <tr>
                              <td class="card-text">Harga Harian</td>
                                <td>:</td>
                                <td>Rp.<?php echo $product['harga_permalam']; ?></td>
                                <td> /malam</td>
                            </tr>
                            <tr>
                              <td class="card-text">Harga Mingguan</td>
                              <td>:</td> 
                              <td>Rp.<?php echo $product['harga_perminggu']; ?></td> 
                              <td>/minggu</td>
                            </tr>
                            <tr>
                              <td class="card-text">Harga Bulanan</td>
                              <td>:</td> 
                              <td>Rp.<?php echo $product['harga_perbulan']; ?></td>
                            <td>/bulan</td>
                            </tr>
                          </table>
                          <hr>
                            <!-- Tambahkan link "Buy Now" dengan query parameter id_tipe_kamar -->
                            <a href="<?php echo base_url('reservation/pesan').'?id_tipe_kamar='.$product['id_tipe_kamar']; ?>" class="btn btn-dark col-sm-12">Pesan Sekarang</a>

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
          <p>Selamat datang di Pondok Maharani! Didirikan sejak tahun 2000, kami adalah akomodasi penginapan dan rumah kost, 
            awalnya Pondok Maharani hanya menyediakan layanan Rumah Kost. Kini, kami telah berkembang menjadi destinasi lengkap
             dengan beragam fasilitas dan harga unggulan, termasuk Ruang Outdoor dan Layanan Laundry.Kami selalu berusaha 
             menciptakan suasana seperti di rumah sendiri bagi setiap tamu dengan layanan pelayanan yang ramah dan profesional. 
             Selamat menikmati pengalaman tak terlupakan bersama kami!</p>
        </div>
        <div class="col-md-6">
          <!-- Add an image here for About Us section -->
          <img src="<?php echo base_url(); ?>assets/img/mainlogo.png" class="img-fluid" alt="About Us Image">
        </div>
      </div>
    </div>
  </section>

