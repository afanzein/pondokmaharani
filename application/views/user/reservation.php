<section class="pesan py-2">
<?php
if (!$this->session->userdata('role')) {
       // Show an alert using JavaScript
       echo '<script>alert("Lakukan proses login terlebih dahulu");</script>';
       // Redirect user to the login page or show an access denied message
       redirect(base_url('login'));

    exit();
}
if ($this->session->userdata('id_akun')) {
    $id_akun = $this->session->userdata('id_akun');

    // Assuming you have a model for the tb_akun table (e.g., Akun_model)
    $this->load->model('M_tamu');
    $nik_tamu = $this->M_tamu->getNikTamuByIdAkun($id_akun);

    if (!$nik_tamu) {
        // Redirect user or show an access denied message
        echo '<script>alert("Lakukan pengisian data profil terlebih dahulu");</script>';
        echo '<script>setTimeout(function(){ window.location.href = "profil"; }, 1000);</script>';
        redirect(base_url('profil')); // Replace 'other_page' with the URL of the page you want to redirect to.
        // or
        // or\
    }
}
?>

<div class="container">
    <hr>
    <h1 class="text-center display-5">Pesan Kamar</h1>
    <hr>
      <div class="row">
        <div class="col-md-6">
            <div class="container-slide">
                <hr>
        <!-- Container for the image gallery --
            <!-- Slideshow container -->
            <div class="slideshow-container">
            <?php foreach ($images as $index => $product): ?>
                    <div class="mySlides">
                    <div class="numbertext"><?php echo ($index + 1) . ' / ' . count($product); ?></div>
                    <img class="demo cursor" src="<?php echo base_url('uploads/foto_kamar/' . $product['deskripsi_foto']); ?>" 
                     onclick="currentSlide(<?php echo ($index + 1); ?>,<?php echo $selected_room['id_tipe_kamar']; ?>)">
                    </div>
            <?php endforeach; ?>
            </div>
        

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- Thumbnail images -->
            <div class="row">
                    <?php foreach ($images as $index => $product): ?>
                            <div class="column">
                            <img class="demo cursor" src="<?php echo base_url('uploads/foto_kamar/' . $product['deskripsi_foto']); ?>" 
                            onclick="currentSlide(<?php echo ($index + 1); ?>)">
                            </div>
                            <!-- Add a dot for each image (used to switch between slides) -->
                            <span class="dot" onclick="currentSlide(<?php echo ($index + 1); ?>)"></span>
                        <?php endforeach; ?>
            </div>
          </div>
        </div>

            <div class="col-md-6"> 
                <div class="container-pesan">
                <form method="post" action="<?php echo base_url('reservation/pesan_submit'); ?> ">
                    <div class="detail-text">
                    <h4 class="text-center">Keterangan Reservasi</h4>
                    <hr>
                            <table class="room-info">
                            <tr>
                                <td><b>Nama Pengguna </b></td>
                                <td>:</td>
                                <td><?php echo $nama_pengguna; ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama Kamar </b></td>
                                <td>:</td>
                                <td><?php echo $room_name; ?></td>
                            </tr>
                            <tr>
                                <td><b>Fasilitas </b></td>
                                <td>:</td>
                                <td><?php echo $fasilitas; ?></td>
                            </tr>
                            <tr>
                                <td><b>Harga Perhari </b></td>
                                <td>:</td>
                                <td>Rp <?php echo number_format($harga_permalam, 0, ',', '.'); ?>,-</td>
                            </tr>
                            <tr>
                                <td><b>Harga Perminggu</b></td>
                                <td>:</td>
                                <td>Rp <?php echo number_format($harga_perminggu, 0, ',', '.'); ?>,-</td>
                            </tr>
                            <tr>
                                <td><b>Harga Perbulan</b></td>
                                <td>:</td>
                                <td>Rp <?php echo number_format($harga_perbulan, 0, ',', '.'); ?>,-</td>
                            </tr>
                        </table>
                        <hr>
                        <input type="hidden" name="id_tipe_kamar" value="<?php echo $id_tipe_kamar; ?>">
                        <h4 class="text-center py">Pilih tanggal</h4>
                        <div class="date-input row">
                            <div class="col-sm">
                                <label for="checkInDate"><b>Check-In    : </b></label>
                                <input type="date" name="tgl_checkin" id="checkInDate" class="form-control">
                            </div>
                            <div class="col-sm">
                                <label for="checkOutDate"><b>Check-Out  : </b></label>
                                <input type="date" name="tgl_checkout" id="checkOutDate" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center py">Biaya</h4>
                        <div class="row">
                          <div class="col-sm">  
                            <label><b>Total Hari   : </b> <input type="text" id="totalDays" readonly></label>
                          </div>
                          <div class="col-sm">
                            <label><b>Total Biaya    : </b> <input type="text" id="totalPayment" readonly></label>
                          </div>
                        </div>
                    </div>
            <button type="submit" class="btn btn-primary col-sm-12" style="margin-top:30px">Pesan</button>
            </div>
        </div>
      </div>
</div>

<script>

  //slideshow
  
  
  function showSlides(n) {
    let slideIndex = 1;
    let maxSlides = document.querySelectorAll(".mySlides").length;
    showSlides(slideIndex);
    slideIndex = n;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    if (n > maxSlides) { slideIndex = 1; }
    if (n < 1) { slideIndex = maxSlides; }

    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (let i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }
  
  $(document).ready(function() {
  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex + n);
  }

  // Thumbnail image controls
  function currentSlide(n) {
    showSlides(n);
  }
  // Attach click event handlers to arrow buttons
  $(".prev").on("click", function() {
    plusSlides(-1);
  });
  
  $(".next").on("click", function() {
    plusSlides(1);
  });
  
    // Attach click event handlers to thumbnail images
    $(".demo").on("click", function() {
      currentSlide($(this).index() + 1);
    });
  
    // Trigger the click on the first thumbnail to initialize the slideshow
    $(".demo").first().click();
});

  
//Hitung bayar
document.addEventListener("DOMContentLoaded", function () {
    // Assuming you have already fetched the prices from the database and stored them in these variables
    const hargaHarian = <?= $harga_permalam ?>;
    const hargaMingguan = <?= $harga_perminggu ?>;
    const hargaBulanan = <?= $harga_perbulan ?>;

    function calculateTotal() {
        const checkInDate = document.getElementById("checkInDate").value;
        const checkOutDate = document.getElementById("checkOutDate").value;

            const startDate = new Date(checkInDate);
            const endDate = new Date(checkOutDate);

            // Periksa apakah tanggal check-in sebelum hari ini
            const hariIni = new Date();
            hariIni.setHours(0, 0, 0, 0); // Set waktu menjadi awal hari
            if (startDate < hariIni) {
                alert("Pilihan tanggal tidak valid. Tanggal check-in harus hari ini atau setelahnya.");
                return;
            }

            // Periksa apakah tanggal check-out sebelum atau sama dengan hari ini
            if (endDate <= hariIni) {
                alert("Pilihan tanggal tidak valid. Tanggal check-out harus lebih kemudian dari hari ini.");
                return;
            }

            // Periksa apakah tanggal check-out sebelum tanggal check-in
            if (startDate >= endDate) {
                alert("Pilihan tanggal tidak valid. Tanggal check-out harus lebih kemudian dari tanggal check-in.");
                return;
            }

        const timeDifference = endDate.getTime() - startDate.getTime();
        const totalDays = Math.ceil(timeDifference / (1000 * 3600 * 24));

        document.getElementById("totalDays").value = totalDays + " hari";

        let totalBayar;
        if (totalDays <= 0) {
            totalBayar = 0;
        } else {
            const totalMonths = Math.floor(totalDays / 30);
            const totalWeeks = Math.floor((totalDays - (totalMonths * 30)) / 7);
            const remainingDays = totalDays - (totalMonths * 30) - (totalWeeks * 7);
            totalBayar = (hargaBulanan * totalMonths) + (hargaMingguan * totalWeeks) + (hargaHarian * remainingDays);
        }

        document.getElementById("totalPayment").value = "Rp " + totalBayar.toLocaleString('id-ID') + ",-";
    }

    // Add event listeners to date pickers
    document.getElementById("checkInDate").addEventListener("change", calculateTotal);
    document.getElementById("checkOutDate").addEventListener("change", calculateTotal);
});
</script>
</section>

