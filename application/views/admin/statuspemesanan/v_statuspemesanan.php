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
                <table id="datatable_03" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Status Pemesanan</th>
                            <th>ID Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Status Pemesanan</th>
                            <th>Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statuspemesanan as $data) : ?>
                            <tr>
                                <td><?php echo $data['id_status_pemesanan']; ?></td>
                                <td><?php echo $data['id_pemesanan']; ?></td>
                                <td><?php echo $data['tgl_pemesanan']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td>
                                <a  style="padding:20px; margin:10px;" href="<?php echo base_url('statuspemesanan/update_status?id=' . $data['id_status_pemesanan'] . '&status=Sedang Diproses'); ?>" class="btn btn-sm btn-primary">Sedang Diproses</a>
                                <a style="padding:20px; margin:10px;" href="<?php echo base_url('statuspemesanan/update_status?id=' . $data['id_status_pemesanan'] . '&status=Selesai Diproses'); ?>" class="btn btn-sm btn-warning">Selesai Diproses</a>
                                <a style="padding:20px; margin:10px;" href="<?php echo base_url('statuspemesanan/update_status?id=' . $data['id_status_pemesanan'] . '&status=Pemesanan Dibatalkan'); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin ingin membatalkan Pemesanan?')">Batalkan Pemesanan</a>
                                
                            </td>
                            </tr>
                            
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
