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
                <a href="<?php echo base_url('fotokamar/fotokamar_insert'); ?>" class="btn btn-primary" style="margin-bottom: 15px;">
                    Tambah Data Foto Kamar
                </a>
                <table id="datatable_03" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Foto</th>
                            <th>ID Tipe Kamar</th>
                            <th>Nama Foto</th>
                            <th>Deskripsi Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($foto_kamar as $data) : ?>
                            <tr>
                                <td><?php echo $data['id_foto']; ?></td>
                                <td><?php echo $data['id_tipe_kamar']; ?></td>
                                <td><?php echo $data['nama_foto']; ?></td>
                                <td><?php echo $data['deskripsi_foto']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('fotokamar/update/') . $data['id_foto']; ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?php echo base_url('fotokamar/delete/') . $data['id_foto']; ?>" onclick="return confirm('Yakin menghapus foto kamar?');">
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
