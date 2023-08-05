<script>
// Select all tabs
$('.nav-tabs a').click(function(){
  $(this).tab('show');
})

// Select tab by name
$('.nav-tabs a[href="#home"]').tab('show')

// Select first tab
$('.nav-tabs a:first').tab('show')

// Select last tab
$('.nav-tabs a:last').tab('show')

// Select fourth tab (zero-based)
$('.nav-tabs li:eq(3) a').tab('show')
</script>
    <!-- Script -->

<!-- Riwayat Pemesanan Section -->
<section id="riwayat py-2">
  <!-- Simulate user login -->

  <div class="container">
        <h1 class="text-center display-4" style="margin: 20px 0 10px 0">Riwayat Pemesanan</h1>
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

      <div class="container">
      <ul class="nav nav-tabs nav-pills">
        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
        <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">

          <!-- History Pemesanan Table -->
          <h2 class="text-center display-4" style="margin-top: 50px;">Riwayat Pemesanan</h2>
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>ID Pemesanan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>No Kamar</th>
                    <th>Nama Tipe Kamar</th>
                    <th>Tanggal Check-in</th>
                    <th>Tanggal Check-out</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fetch and display data from the database (tb_pemesanan, tb_kamar, tb_tipe_kamar, tb_checkinout, tb_status_pemesanan) -->
                    <?php foreach ($riwayat as $r) { ?>
                    <tr>
                        <td><?php echo $r->no; ?></td>
                        <td><?php echo $r->id_pemesanan; ?></td>
                        <td><?php echo $r->tgl_pemesanan; ?></td>
                        <td><?php echo $r->no_kamar; ?></td>
                        <td><?php echo $r->nama_tipe_kamar; ?></td>
                        <td><?php echo $r->tgl_checkin; ?></td>
                        <td><?php echo $r->tgl_checkout; ?></td>
                        <td><?php echo $r->status; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
            <!-- End of History Pemesanan Table -->
          <!-- End of History Pemesanan Table -->
          </div>
        </div>
        <div id="menu1" class="tab-pane fade">

            <!-- Laundry Items Table -->
            <h2 class="text-center display-4" style="margin-top: 50px;">Layanan Laundry</h2>
            <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                        <th>No</th>
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
                            <td><?php echo $l->no; ?></td>
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
 </div>
</section>