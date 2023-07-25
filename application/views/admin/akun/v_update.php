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
    
              <form method="POST" action="<?php echo base_url('akun/akun_update/' . $d['id_akun']); ?>" class="form-horizontal">
    
                <div class="card-body">
    
    
                  <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email',$d['email']); ?>" placeholder="Masukkan Email">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('email')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username',$d['username']); ?>" placeholder="Masukkan Username">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('username')); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="password" id="password" value="<?php echo set_value('password',$d['password']); ?>" placeholder="Masukkan Password">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('password')); ?></span>
                  </div>
                </div>

              <div class="form-group row">
                  <label for="id_role" class="col-sm-2 col-form-label">ID Role</label>
                  <div class="col-sm-10">
                  <select class="form-control" name="id_role" id="id_role" 
                  value="<?php echo form_dropdown('id_role', $ddrole, set_value('id_role',$d['id_role'])); ?>  
                    <span class= "badge badge-warning"><?php echo strip_tags(form_error('id_role')); ?></span>
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