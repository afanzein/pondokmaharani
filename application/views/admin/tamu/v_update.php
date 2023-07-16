<div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?php echo  $title; ?></h1>
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
    
              <?php echo validation_errors(); ?>
    
              <form method="POST" action="<?php echo base_url('tamu/tamu_update/' . $d['nik_tamu']); ?>" class="form-horizontal">
    
                <div class="card-body">
    
                <div class="form-group row">
                  <label for="nik_tamu" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="numeric" pattern="[0-9]+" class="form-control" name="nik_tamu" id="nik_tamu" value="<?php echo set_value('nik_tamu',$d['nik_tamu']); ?>" placeholder="Masukkan NIK">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_tamu')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nama_tamu" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_tamu" id="nama_tamu" value="<?php echo set_value('nama_tamu',$d['nama_tamu']); ?>" placeholder="Masukkan Nama">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_tamu')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                    <label >
                    <input type="radio"  name="jenis_kelamin" id="jenis_kelamin" 
                    value="L" <?php if($d['jenis_kelamin']=='L') echo 'checked'?>> Laki-Laki
                  </label>
                  <label >
                    <input type="radio"  name="jenis_kelamin" id="jenis_kelamin"
                    value="P" <?php if($d['jenis_kelamin']=='P') echo 'checked'?>> Perempuan                 
                  </label>
                </div>
                <span class="badge badge-warning"><?php echo strip_tags(form_error('jenis_kelamin')); ?></span>
                </div>
  
                <div class="form-group row">
                    <label for="tanggal lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" 
                        value="<?php echo set_value('tgl_lahir',$d['tgl_lahir']); ?>">
                        <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_lahir')); ?></span>
                      </div>
                </div>

                <div class="form-group row">
                  <label for="no_telp" class="col-sm-2 col-form-label">No Telp.</label>
                  <div class="col-sm-10">
                    <input type="tel" pattern="[0-9]+" class="form-control" name="no_telp" id="no_telp" value="<?php echo set_value('no_telp',$d['no_telp']); ?>" placeholder="Masukkan no_telp">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('no_telp')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat',$d['alamat']); ?>" placeholder="Masukkan alamat">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat')); ?></span>
                  </div>
                </div>

              <div class="form-group row">
                  <label for="id_akun" class="col-sm-2 col-form-label">ID Akun</label>
                  <div class="col-sm-10">
                  <select class="form-control" name="id_akun" id="id_akun" 
                  value="<?php echo form_dropdown('id_akun', $ddakun, set_value('id_akun',$d['id_akun'])); ?>  
                    <span class= "badge badge-warning"><?php echo strip_tags(form_error('id_akun')); ?></span>
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