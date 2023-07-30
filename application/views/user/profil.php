<div class="container">
    <h1 class="text-center display-3" style="margin:20px 0 10px 0 ">Halaman Profil</h1>
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
        
        <?php if ($this->session->flashdata('success_message')) : ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success_message'); ?>
        </div>
    <?php endif; ?>
    <hr>
        <h3 class="display-5"> Mohon isi data diri dibawah jika belum ada ! </h3>
        <p class="lead"> Data diri anda akan digunakan untuk proses pemesanan </p>
        <hr size="5px">
    <form method="POST" action="<?php echo base_url('profil/update_profil'); ?>" class="form-horizontal">


        <div class="form-group row">
            <label for="nik_tamu" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input type="numeric" pattern="[0-9]+" class="form-control" name="nik_tamu" id="nik_tamu" value="<?php echo $data['nik_tamu']; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_tamu" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_tamu" id="nama_tamu" value="<?php echo $data['nama_tamu']; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" name="jenis_kelamin" value="L" <?php echo ($data['jenis_kelamin'] == 'L') ? 'checked' : ''; ?>> Laki-Laki
                </label>
                <label>
                    <input type="radio" name="jenis_kelamin" value="P" <?php echo ($data['jenis_kelamin'] == 'P') ? 'checked' : ''; ?>> Perempuan
                </label>
            </div>
        </div>

        <div class="form-group row">
            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="no_telp" class="col-sm-2 col-form-label">No Telp.</label>
            <div class="col-sm-10">
                <input type="tel" pattern="[0-9]+" class="form-control" name="no_telp" id="no_telp" value="<?php echo $data['no_telp']; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $data['alamat']; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 text-center" style="margin:15px 0 10px 0 ">
                <button type="submit" class="btn btn-primary" >Simpan</button>
            </div>
        </div>
    </form>
</div>
