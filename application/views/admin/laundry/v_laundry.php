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
                <h3 class="card-title">Data Laundry</h3>
            </div>
            <div class="card-body">
            <a href=<?php echo base_url("laundry/laundry_insert") ?> class="btn btn-primary" style="margin-bottom:15px">
            Tambah Laundry</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Laundry</th>
                            <th>ID Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Berat (Kg)</th>
                            <th>Subtotal</th>
                            <?php if ($this->session->userdata('role') == 1): ?>
                            <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($laundry as $data) { ?>
                            <tr>
                                <td><?php echo $data['id_laundry']; ?></td>
                                <td><?php echo $data['id_pemesanan']; ?></td>
                                <td><?php echo $data['tgl_pemesanan']; ?></td>
                                <td><?php echo $data['harga_satuan']; ?></td>
                                <td><?php echo $data['jumlah_laundry']; ?></td>
                                <td><?php echo $data['subtotal']; ?></td>
                                <?php if ($this->session->userdata('role') == 1): ?>
                                <td>
                                    <a href="<?php echo base_url('laundry/laundry_update/' . $data['id_laundry']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo base_url('laundry/laundry_delete/' . $data['id_laundry']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this <?php echo $title; ?>?')">Delete</a>
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
