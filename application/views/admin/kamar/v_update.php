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
                <h3 class="card-title">Update Data Kamar</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('kamar/kamar_update/'.$d['id_kamar']); ?>" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nomor_kamar" class="col-sm-2 col-form-label">Nomor Kamar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nomor_kamar" id="nomor_kamar" value="<?php echo $d['nomor_kamar']; ?>">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('nomor_kamar')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_tipe_kamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_tipe_kamar" id="id_tipe_kamar">
                                    <option value="-Pilih-">-Pilih-</option>
                                    <?php foreach ($tipekamar as $tk) { ?>
                                        <option value="<?php echo $tk['id_tipe_kamar']; ?>" <?php if ($d['id_tipe_kamar'] == $tk['id_tipe_kamar']) echo 'selected'; ?>><?php echo $tk['nama_tipe_kamar']; ?></option>
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
                                    <option value="Tersedia" <?php if ($d['status_kamar'] == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                                    <option value="Terisi" <?php if ($d['status_kamar'] == 'Terisi') echo 'selected'; ?>>Terisi</option>
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
