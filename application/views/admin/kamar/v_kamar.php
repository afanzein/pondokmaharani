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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kamar as $k) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $k['nomor_kamar']; ?></td>
                                    <td><?php echo $k['nama_tipe_kamar']; ?></td>
                                    <td><?php echo $k['status_kamar']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('kamar/kamar_update/' . $k['id_kamar']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo base_url('kamar/kamar_delete/' . $k['id_kamar']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
