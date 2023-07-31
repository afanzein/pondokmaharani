<!-- v_pembayaran.php -->
<div class="container mt-6">
    <h1 class="text-center">Halaman Pembayaran</h1>
    <?php foreach ($pembayaran as $p) : ?>
        <div class="pembayaran">
            <h2>Data Pembayaran</h2>
            <p><span class="label">Tanggal Pembayaran:</span> <?php echo $p['tanggal_pembayaran']; ?></p>
            <p><span class="label">Nama Pemesan:</span> <?php echo $nama_tamu; ?></p>
            <p><span class="label">NIK Pemesan:</span> <?php echo $nik_tamu; ?></p>
            <p><span class="label">Tanggal Pemesanan:</span> <?php echo $p['tanggal_pemesanan']; ?></p>
            <p><span class="label">Tanggal Pemesanan:</span> <?php echo $p['status_pemesanan']; ?></p>
            <div class="container">
                <h4 class="toggle-detail" onclick="togglePaymentDetails()">Detail Pembayaran <i class="arrow-icon fas fa-chevron-right"></i></h4>
                <div class="detail-pembayaran" id="paymentDetails">
                    <table class="table table-borderless">
                        <tbody>
                            <?php
                            $detail_pembayaran = $this->M_pembayaran->get_detail_pembayaran($p['id_pembayaran']);
                            foreach ($detail_pembayaran as $detail) : ?>
                                <tr>
                                    <td><span class="label">Item yang Dibayar</span></td>
                                    <td>:</td>
                                    <td><?php echo $detail['item']; ?></td>
                                </tr>
                                    <td><span class="label">Total Hari</span> </td>
                                    <td>:</td>
                                    <td><?php echo $detail['total_hari']; ?> hari</td>
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
