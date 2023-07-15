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
                            <th>ID Check In & Out</th>
                            <th>ID Pemesanan</th>
                            <th>NIK TAMU</th>
                            <th>Tanggal Check In</th>
                            <th>Tanggal Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($checkinout as $data) : ?>
                            <tr>
                                <td><?php echo $data['id_checkinout']; ?></td>
                                <td><?php echo $data['id_pemesanan']; ?></td>
                                <td><?php echo $data['nik_tamu']; ?></td>
                                <td><?php echo $data['tgl_checkin']; ?></td>
                                <td><?php echo $data['tgl_checkout']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
