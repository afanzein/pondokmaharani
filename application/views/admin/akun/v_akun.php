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
          <div class="card-body">
          <a href=<?php echo base_url("akun/akun_insert") ?> class="btn btn-primary" style="margin-bottom:15px">
            Tambah Akun</a>
            <table id="datatable_03" class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php $i = 1;
              foreach ($akun as $data) { ?>
                <tr>
                  <td><?php echo $data['id_akun'] ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['username'] ?></td>
                  <td><?php echo $data['password'] ?></td>
                  <td><?php echo $data['id_role'] ?></td>
                  <td>
                  <a href=<?php echo base_url("akun/akun_update/") . $data['id_akun']; ?>> <i class="fas fa-pencil-alt"></i> </a>
                  <a href=<?php echo base_url("akun/akun_delete/") . $data['id_akun']; ?> onclick="return confirm('Yakin menghapus staff: <?php echo $data['username']; ?> ?');" ;><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
              <?php
              }
              ?>
            </table>
            </div>
        </div>
      </section>
    </div>