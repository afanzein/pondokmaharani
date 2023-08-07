
    <!-- Script -->
<!-- Riwayat Pemesanan Section -->
<section id="riwayat py-2">
  <!-- Simulate user login -->

  <div class="container">
        <h1 class="text-center" style="margin: 20px 0 10px 0">Riwayat Pemesanan</h1>
        <hr>
        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
              <p class="form-control-plaintext"><?php echo $username; ?></p>
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <p class="form-control-plaintext"><?php echo $email; ?></p>
          </div>
        </div>
        
        <hr>
        
  </div>


  <div class="container">
    <h2 class="text-center font-weight-light">Pilih riwayat yang ingin Anda tampilkan</h2>
      <ul class="nav nav-tabs nav-justified">
        <li class="nav-item"><a  class="nav-link active" data-toggle="tab" href="#reservasi">Reservasi</a></li>
        <li class="nav-item"><a  class="nav-link" data-toggle="tab" href="#laundry">Laundry</a></li>
      </ul>

      <div class="tab-content">
        
        <div id="reservasi" class="tab-pane container active">
            <!-- History Pemesanan Table -->
          <h4 class="text-center font-weight-light" style="margin-top: 30px;">Reservasi</h4>
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th>ID Pemesanan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>No Kamar</th>
                    <th>Nama Tipe Kamar</th>
                    <th>Tanggal Check-in</th>
                    <th>Tanggal Check-out</th>
                    <th>Status</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fetch and display data from the database (tb_pemesanan, tb_kamar, tb_tipe_kamar, tb_checkinout, tb_status_pemesanan) -->
                    <?php foreach ($reservasi as $r) { ?>
                    <tr>
                        <td><?php echo $r->id_pemesanan; ?></td>
                        <td><?php echo $r->tgl_pemesanan; ?></td>
                        <td><?php echo $r->nomor_kamar; ?></td>
                        <td><?php echo $r->nama_tipe_kamar; ?></td>
                        <td><?php echo $r->tgl_checkin; ?></td>
                        <td><?php echo $r->tgl_checkout; ?></td>
                        <td><?php echo $r->status; ?></td>
                        <td>
                            <a href="<?php echo base_url('bayartamu/tampil').'?id_pemesanan='.$r->id_pemesanan; ?>" class="btn btn-info col-sm">Pesan Sekarang</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
          </div>
          
          <div id="laundry" class="tab-pane container fade">

            <!-- Laundry Items Table -->
            <h4 class="text-center font-weight-light " style="margin-top: 30px;">Layanan Laundry</h4>
            <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                        <th>ID Laundry</th>
                        <th>ID Pemesanan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Laundry</th>
                        <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Fetch and display data from the database (tb_laundry) -->
                        <?php foreach ($laundry as $l) { ?>
                        <tr>
                            <td><?php echo $l->id_laundry; ?></td>
                            <td><?php echo $l->id_pemesanan; ?></td>
                            <td><?php echo $l->harga_satuan; ?></td>
                            <td><?php echo $l->jumlah_laundry; ?></td>
                            <td><?php echo $l->subtotal; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
              <!-- End of Laundry Items Table -->
          </div>
       </div>
       <script>
    $(document).ready(function(){
      $(".nav-tabs a").click(function(){
        $(this).tab('show');
      });
    });
</script>
  </div>
</section>

