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
                <a href="<?php echo base_url('tipekamar/tipekamar_insert'); ?>" class="btn btn-primary" style="margin-bottom: 15px;">
                    Tambah Data Tipe Kamar
                </a>
                <table id="datatable_03" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Tipe Kamar</th>
                            <th>Nama Tipe Kamar</th>
                            <th>Fasilitas</th>
                            <th>Harga per Malam</th>
                            <th>Harga per Minggu</th>
                            <th>Harga per Bulan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tipekamar as $data) : ?>
                            <tr>
                                <td><?php echo $data['id_tipe_kamar']; ?></td>
                                <td><?php echo $data['nama_tipe_kamar']; ?></td>
                                <td><?php echo $data['fasilitas']; ?></td>
                                <td><?php echo $data['harga_permalam']; ?></td>
                                <td><?php echo $data['harga_perminggu']; ?></td>
                                <td><?php echo $data['harga_perbulan']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('tipekamar/tipekamar_update/') . $data['id_tipe_kamar']; ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?php echo base_url('tipekamar/tipekamar_delete/') . $data['id_tipe_kamar']; ?>" onclick="return confirm('Yakin menghapus tipe kamar?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
