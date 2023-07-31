<!-- v_pembayaran.php -->
<div class="container mt-6">
    <h1 class="text-center">Halaman Pembayaran</h1>
    <?php foreach ($pembayaran as $p) : ?>
        <div class="pembayaran">
        <hr>
            <h2>Data Pembayaran</h2>
            <hr>
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
        </div>
    <?php endforeach; ?>
</div>
