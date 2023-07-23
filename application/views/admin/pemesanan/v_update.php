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
                <h3 class="card-title">Update Data Pemesanan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('pemesanan/pemesanan_update/'.$d['id_pemesanan']); ?>" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="tgl_pemesanan" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl_pemesanan" id="tgl_pemesanan" value="<?php echo $d['tgl_pemesanan']; ?>">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_pemesanan')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik_tamu" class="col-sm-2 col-form-label">Nama Tamu</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nik_tamu" id="nik_tamu">
                                    <?php foreach ($ddtamu as $data) { ?>
                                        <option value="<?php echo $data['nik_tamu']; ?>" <?php if ($d['nik_tamu'] == $data['nik_tamu']) echo 'selected'; ?>><?php echo $data['nama_tamu']; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_tamu')); ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_kamar" class="col-sm-2 col-form-label">Nomor Kamar</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_kamar" id="id_kamar">
                                    <?php foreach ($ddkamar as $data) { ?>
                                        <option value="<?php echo $data['id_kamar']; ?>" <?php if ($d['id_kamar'] == $data['id_kamar']) echo 'selected'; ?>><?php echo $data['nomor_kamar']; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('id_kamar')); ?></span>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="tgl_checkin" class="col-sm-2 col-form-label">Tanggal Check-In</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl_checkin" id="tgl_checkin"
                                min="<?php echo date('Y-m-d'); ?> value="<?php echo set_value('tgl_checkin',$d['tgl_checkin']); ?>>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_checkin')); ?></span>
                            </div>
                            </div>

                        <div class="form-group row">
                            <label for="tgl_checkout" class="col-sm-2 col-form-label">Tanggal Check-Out</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl_checkout" id="tgl_checkout" 
                                min="<?php echo date('Y-m-d'); ?> value="<?php echo set_value('tgl_checkout',$d['tgl_checkout']); ?>>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_checkout')); ?></span>
                            </div>
                        </div>                

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
