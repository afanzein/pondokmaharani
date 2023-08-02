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
                <h3 class="card-title">Data Kamar</h3>
            </div>
            <div class="card-body">
                <a href="<?php echo base_url('kamar/kamar_insert'); ?>" class="btn btn-primary mb-3">Tambah Kamar</a>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Kamar</th>
                                <th>Tipe Kamar</th>
                                <th>Status Kamar</th>
                                <th>Update Status Kamar</th>
                                <?php if ($this->session->userdata('role') == 1): ?>
                                <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kamar as $data) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nomor_kamar']; ?></td>
                                    <td><?php echo $data['nama_tipe_kamar']; ?></td>
                                    <td><?php echo $data['status_kamar']; ?></td>
                                    <td>
                                    <a href="<?php echo base_url('kamar/update_status?id=' . $data['id_kamar'] . '&status=Tersedia'); ?>" class="btn btn-sm btn-success">Tersedia</a>
                                    <a href="<?php echo base_url('kamar/update_status?id=' . $data['id_kamar'] . '&status=Tidak Tersedia'); ?>" class="btn btn-sm btn-danger">Tidak Tersedia</a>
                                    </td>
                                    <?php if ($this->session->userdata('role') == 1): ?>
                                    <td>
                                    <div class="btn-group-vertical">
                                        <a href="<?php echo base_url('kamar/kamar_update/' . $data['id_kamar']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo base_url('kamar/kamar_delete/' . $data['id_kamar']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
