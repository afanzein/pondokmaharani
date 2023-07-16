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
                <h3 class="card-title">Tambah Data Pemesanan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('pemesanan/pemesanan_insert'); ?>" class="form-horizontal">
                    <div class="form-group row">
                        <label for="tgl_pemesanan" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_pemesanan" id="tgl_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo set_value('tgl_pemesanan'); ?>">
                            <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_pemesanan')); ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nik_tamu" class="col-sm-2 col-form-label">Nama Tamu</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="nik_tamu" id="nik_tamu">
                                <?php foreach ($ddtamu as $nik => $nama_tamu) { ?>
                                    <option value="<?php echo $nik; ?>" <?php echo set_select('nik_tamu', $nik); ?>><?php echo $nama_tamu; ?></option>
                                <?php } ?>
                            </select>
                            <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_tamu')); ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_kamar" class="col-sm-2 col-form-label">Nomor Kamar</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_kamar" id="id_kamar">
                                <?php foreach ($ddkamar as $id_kamar => $nomor_kamar) { ?>
                                    <option value="<?php echo $id_kamar; ?>" <?php echo set_select('id_kamar', $id_kamar); ?>><?php echo $nomor_kamar; ?></option>
                                <?php } ?>
                            </select>
                            <span class="badge badge-warning"><?php echo strip_tags(form_error('id_kamar')); ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_status_pemesanan" class="col-sm-2 col-form-label">Status Pemesanan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_status_pemesanan" id="id_status_pemesanan">
                                <?php foreach ($ddstatus as $id_status_pemesanan => $status) { ?>
                                    <option value="<?php echo $id_status_pemesanan; ?>" <?php echo set_select('id_status_pemesanan', $id_status_pemesanan); ?>><?php echo $status; ?></option>
                                <?php } ?>
                            </select>
                            <span class="badge badge-warning"><?php echo strip_tags(form_error('id_status_pemesanan')); ?></span>
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
