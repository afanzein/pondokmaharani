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
                <h3 class="card-title">Update Data Kendaraan</h3>
            </div>
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <form method="POST" action="<?php echo base_url('kendaraan/kendaraan_update/'.$kendaraan['id_kendaraan']); ?>" class="form-horizontal">
                    <div class="card-body">
                        
                    <div class="form-group row">
                        <label for="nik_tamu" class="col-sm-2 col-form-label">Nama Tamu</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="nik_tamu" id="nik_tamu"
                        value="<?php echo form_dropdown('nik_tamu', $ddtamu, set_value('nik_tamu',$d['nik_tamu'])); ?>
                            <span class= "badge badge-warning"><?php echo strip_tags(form_error('nik_tamu')); ?></span>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="jenis_kendaraan" class="col-sm-2 col-form-label">Jenis Kendaraan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jenis_kendaraan" id="jenis_kendaraan">
                                    <option value="">-Pilih Jenis Kendaraan-</option>
                                    <option value="Roda Empat" <?php if ($kendaraan['jenis_kendaraan'] == 'Roda Empat') echo 'selected'; ?>>Roda Empat</option>
                                    <option value="Roda Dua" <?php if ($kendaraan['jenis_kendaraan'] == 'Roda Dua') echo 'selected'; ?>>Roda Dua</option>
                                </select>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('jenis_kendaraan')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plat_nomor" class="col-sm-2 col-form-label">Plat Nomor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="plat_nomor" id="plat_nomor" value="<?php echo $kendaraan['plat_nomor']; ?>" placeholder="Masukkan Plat Nomor">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('plat_nomor')); ?></span>
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
