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
    

    
              <form method="POST" action="<?php echo base_url('pegawai/pegawai_update/' . $d['nik_pegawai']); ?>" class="form-horizontal">
    
                <div class="card-body">
    
                <div class="form-group row">
                  <label for="nik_pegawai" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="numeric" pattern="[0-9]+"  class="form-control" name="nik_pegawai" id="nik_pegawai" value="<?php echo set_value('nik_pegawai',$d['nik_pegawai']); ?>" placeholder="Masukkan NIK">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_pegawai')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?php echo set_value('nama_pegawai',$d['nama_pegawai']); ?>" placeholder="Masukkan Nama">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pegawai')); ?></span>
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
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jenis_kelamin')); ?></span>
                  </div>
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
                  <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo set_value('jabatan',$d['jabatan']); ?>" placeholder="Masukkan jabatan">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('jabatan')); ?></span>
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
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat',$d['alamat']); ?>" placeholder="Masukkan Alamat">
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