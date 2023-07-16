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
                <form method="POST" action="<?php echo base_url('fotokamar/fotokamar_insert'); ?>" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card-body">
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
                            <label for="deskripsi_foto" class="col-sm-2 col-form-label">Deskripsi Foto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="deskripsi_foto" id="deskripsi_foto" placeholder="Masukkan Deskripsi Foto">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi_foto')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto[]" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="foto[]" id="foto" multiple>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('foto[]')); ?></span>
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
