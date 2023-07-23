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
                    <h3 class="card-title">Data Pemesanan</h3>
                </div>
                <div class="card-body">
                    <a href="<?php echo base_url('pemesanan/pemesanan_insert'); ?>" class="btn btn-primary" style="margin-bottom:15px">Tambah Pemesanan</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Pemesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Nama Tamu</th>
                                <th>Nomor Kamar</th>
                                <th>Status</th>
                                <?php if ($this->session->userdata('role') == 1): ?>
                                <th>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pemesanan as $data) { ?>
                                <tr>
                                    <td><?php echo $data['id_pemesanan']; ?></td>
                                    <td><?php echo $data['tgl_pemesanan']; ?></td>
                                    <td><?php echo $data['nama_tamu']; ?></td>
                                    <td><?php echo $data['nomor_kamar']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <?php if ($this->session->userdata('role') == 1): ?>
                                    <td>
                                        <a href="<?php echo base_url('pemesanan/pemesanan_update/' . $data['id_pemesanan']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="<?php echo base_url('pemesanan/pemesanan_delete/' . $data['id_pemesanan']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Pemesanan?')">Delete</a>
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
