<!-- v_pembayaran.php -->
<section class="bayar py-2">
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
<div class="container mt-6">
    <h1 class="text-center">Halaman Pembayaran</h1>
    <?php foreach ($pembayaran as $p) : ?>
        <div class="pembayaran">
            <h2>Data Pembayaran</h2>
            <hr>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><span class="label">Tanggal Pembayaran:</span></td>
                            <td>:</td>
                            <td><?php echo $p['tgl_pembayaran']; ?></td>
                        </tr>
                        <tr>
                            <td><span class="label">Nama Pemesan:</span></td>
                            <td>:</td>
                            <td><?php echo $nama_tamu; ?></td>
                        </tr>
                        <tr>
                            <td><span class="label">NIK Pemesan:</span></td>
                            <td>:</td>
                            <td><?php echo $nik_tamu; ?></td>
                        </tr>
                        <tr>
                            <td><span class="label">Tanggal Pemesanan:</span></td>
                            <td>:</td>
                            <td><?php echo $p['tgl_pemesanan']; ?></td>
                        </tr>
                        <tr>
                            <td><span class="label">Status Pemesanan:</span></td>
                            <td>:</td>
                            <td><?php echo $p['status']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="container">
                <h4 class="toggle-detail" onclick="togglePaymentDetails()">Detail Pembayaran <i class="arrow-icon fas fa-chevron-right"></i></h4>
                <div class="detail-pembayaran" id="paymentDetails">
                    <table class="table table-borderless">
                        <tbody>
                            <?php
                           foreach ($detail_pembayaran as $detail) : ?>
                                <tr>
                                    <td><span class="label">Item yang dibayar</span></td>
                                    <td>:</td>
                                    <td><?php echo $detail['item_pembayaran']; ?></td>
                                </tr>
                                    <td><span class="label"></span>Total Hari</td>
                                    <td>:</td>
                                    <td><?php echo $detail['jumlah_pembayaran']; ?> hari</td>
                                </tr>
                                <tr>
                                    <td><span class="label">Subtotal</span></td>  
                                    <td>:</td>
                                    <td>Rp. <?php echo number_format($detail['subtotal'], 0, ',', '.'); ?>,-</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <a href="<?php echo base_url('bayartamu/update_status?id=' . $p['id_pembayaran'] . '&status=Pembayaran Dibatalkan'); ?>" class="btn btn-sm btn-danger text-center" onclick="return confirm('Apakah yakin ingin membatalkan Pembayaran?')">Batalkan Pembayaran</a>
        </div>
    <?php endforeach; ?>
</div>
</section>
