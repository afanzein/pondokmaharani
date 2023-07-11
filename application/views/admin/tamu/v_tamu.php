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
          <a href=<?php echo base_url("tamu/tamu_insert") ?> class="btn btn-primary" style="margin-bottom:15px">
            Tambah Pegawai</a>
            <table id="datatable_03" class="table table-bordered">
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jenkel</th>
                  <th>Tgl Lahir</th>
                  <th>No. Telp</th>
                  <th>alamat</th>
                  <th>ID Akun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php $i = 1;
              foreach ($tamu as $data) { ?>
                <tr>
                  <td><?php echo $data['nik_tamu'] ?></td>
                  <td><?php echo $data['nama_tamu'] ?></td>
                  <td><?php echo $data['jenis_kelamin'] ?></td>
                  <td><?php echo $data['tgl_lahir'] ?></td>
                  <td><?php echo $data['no_telp'] ?></td>
                  <td><?php echo $data['alamat'] ?></td>
                  <td><?php echo $data['id_akun']?></td>
                  <td>
                  <a href=<?php echo base_url("tamu/tamu_update/") . $data['nik_tamu']; ?>> <i class="fas fa-pencil-alt"></i> </a>
                  <a href=<?php echo base_url("tamu/tamu_delete/") . $data['nik_tamu']; ?> onclick="return confirm('Yakin menghapus staff: <?php echo $data['nama_tamu']; ?> ?');" ;><i class="fas fa-trash-alt"></i></a>
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