<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $title; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Data Tipe Kamar</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('tipekamar/tipekamar_update/' . $d['id_tipe_kamar']); ?>" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_tipe_kamar" class="col-sm-2 col-form-label">Nama Tipe Kamar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_tipe_kamar" id="nama_tipe_kamar" value="<?php echo set_value('nama_tipe_kamar', $d['nama_tipe_kamar']); ?>" placeholder="Masukkan Nama Tipe Kamar">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_tipe_kamar')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fasilitas" id="fasilitas" value="<?php echo set_value('fasilitas', $d['fasilitas']); ?>" placeholder="Masukkan Fasilitas">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('fasilitas')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga_permalam" class="col-sm-2 col-form-label">Harga per Malam</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="harga_permalam" id="harga_permalam" value="<?php echo set_value('harga_permalam', $d['harga_permalam']); ?>" placeholder="Masukkan Harga per Malam">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('harga_permalam')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga_perminggu" class="col-sm-2 col-form-label">Harga per Minggu</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="harga_perminggu" id="harga_perminggu" value="<?php echo set_value('harga_perminggu', $d['harga_perminggu']); ?>" placeholder="Masukkan Harga per Minggu">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('harga_perminggu')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga_perbulan" class="col-sm-2 col-form-label">Harga per Bulan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="harga_perbulan" id="harga_perbulan" value="<?php echo set_value('harga_perbulan', $d['harga_perbulan']); ?>" placeholder="Masukkan Harga per Bulan">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('harga_perbulan')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
