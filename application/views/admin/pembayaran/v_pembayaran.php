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
        <a href="<?php echo base_url('pembayaran/pembayaran_insert'); ?>" class="btn btn-primary" style="margin-bottom: 15px;">Tambah Pembayaran</a>
        <table id="datatable_03" class="table table-bordered">
          <thead>
            <tr>
              <th>ID Pembayaran</th>
              <th>ID Pemesanan</th>
              <th>Tanggal Pembayaran</th>
              <th>Status Pembayaran</th>
              <th>Update Status Pembayaran</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pembayaran as $data) { ?>
              <tr>
                <td><?php echo $data['id_pembayaran']; ?></td>
                <td><?php echo $data['id_pemesanan']; ?></td>
                <td><?php echo $data['tgl_pembayaran']; ?></td>
                <td><?php echo $data['status_pembayaran']; ?></td>
                <td>
                  <div class="btn-group-vertical">
                <a href="<?php echo base_url('pembayaran/update_status?id=' . $data['id_pembayaran'] . '&status=Menunggu Pembayaran'); ?>" class="btn btn-sm btn-primary">Menunggu Pembayaran</a>
                <a href="<?php echo base_url('pembayaran/update_status?id=' . $data['id_pembayaran'] . '&status=Sudah dibayar'); ?>" class="btn btn-sm btn-warning">Sudah dibayar</a>
                <a href="<?php echo base_url('pembayaran/update_status?id=' . $data['id_pembayaran'] . '&status=Pembayaran Dibatalkan'); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin ingin membatalkan Pembayaran?')">Batalkan Pembayaran</a>
                </div>  
              </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
