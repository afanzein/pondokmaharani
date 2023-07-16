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
                <h3 class="card-title">Isikan Data Dengan Benar</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('kamar/kamar_insert'); ?>" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nomor_kamar" class="col-sm-2 col-form-label">Nomor Kamar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nomor_kamar" id="nomor_kamar" placeholder="Masukkan Nomor Kamar">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('nomor_kamar')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_tipe_kamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_tipe_kamar" id="id_tipe_kamar">
                                    <?php foreach ($ddtipekamar as $id_tipe_kamar => $nama_tipe_kamar) { ?>
                                        <option value="<?php echo $id_tipe_kamar; ?>"><?php echo $nama_tipe_kamar; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('id_tipe_kamar')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_kamar" class="col-sm-2 col-form-label">Status Kamar</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status_kamar" id="status_kamar">
                                    <option value="-Pilih-">-Pilih-</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Terisi">Terisi</option>
                                </select>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('status_kamar')); ?></span>
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
