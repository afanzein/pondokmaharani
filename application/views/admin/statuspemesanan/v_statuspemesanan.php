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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statuspemesanan as $data) : ?>
                            <tr>
                                <td><?php echo $data['id_status_pemesanan']; ?></td>
                                <td><?php echo $data['id_pemesanan']; ?></td>
                                <td><?php echo $data['tgl_pemesanan']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
