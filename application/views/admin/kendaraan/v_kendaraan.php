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
      <div class="card-body">
        <a href="<?php echo base_url('kendaraan/kendaraan_insert'); ?>" class="btn btn-primary" style="margin-bottom: 15px;">
          Tambah Kendaraan
        </a>
        <table id="datatable_03" class="table table-bordered">
          <thead>
            <tr>
              <th>ID Kendaraan</th>
              <th>NIK Tamu</th>
              <th>Jenis Kendaraan</th>
              <th>Plat Nomor</th>
              <?php if ($this->session->userdata('role') == 1): ?>
              <th>Aksi</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kendaraan as $data) { ?>
              <tr>
                <td><?php echo $data['id_kendaraan']; ?></td>
                <td><?php echo $data['nik_tamu']; ?></td>
                <td><?php echo $data['jenis_kendaraan']; ?></td>
                <td><?php echo $data['plat_nomor']; ?></td>
                <?php if ($this->session->userdata('role') == 1): ?>
                <td>
                  <a href="<?php echo base_url('kendaraan/kendaraan_update/') . $data['id_kendaraan']; ?>">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <a href="<?php echo base_url('kendaraan/kendaraan_delete/') . $data['id_kendaraan']; ?>" onclick="return confirm('Yakin menghapus kendaraan?');">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
                <?php endif; ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
