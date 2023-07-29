<div class="slider-pemesanan">
    <?php foreach ($photos as $index => $photo): ?>
        <div class="myPemesanan">
            <img src="uploads/foto_kamar/<?php echo $photo['deskripsi_foto']; ?>" >
        </div>
    <?php endforeach; ?>
</div>
<div class="thumbnail-container">
    <?php foreach ($photos as $index => $photo): ?>
        <div class="thumbnailPemesanan" onclick="currentDiv(<?php echo $index + 1; ?>)">
            <img src="uploads/foto_kamar/<?php echo $photo['deskripsi_foto']; ?>" alt="Room Thumbnail">
        </div>
    <?php endforeach; ?>
</div>
<div class="detail-text">
    <p><b>Nama Pengguna :</b> <?php echo $nama_pengguna; ?></p>
    <p><b>Nama Kamar    :</b> <?php echo $room_name; ?></p>
    <p><b>Fasilitas     :</b> <?php echo $fasilitas; ?></p>
    <p><b>Harga         :</b> Rp <?php echo number_format($harga_permalam, 0, ',', '.'); ?>,-</p>
    <div class="date-input">
        <label for="checkInDate"><b>Check-In    : </b></label>
        <input type="date" name="tgl_checkin" id="checkInDate" class="form-control">
        <label for="checkOutDate"><b>Check-Out  : </b></label>
        <input type="date" name="tgl_checkout" id="checkOutDate" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Daftar</button>
</div>

