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
                <a href="<?php echo base_url('detailpembayaran/detailpembayaran_insert'); ?>" class="btn btn-primary" style="margin-bottom:15px">Tambah Detail Pembayaran</a>
                <table id="datatable_03" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>Item Pembayaran</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach ($detail_pembayaran as $data) { ?>
                        <tr>
                            <td><?php echo $data['id_pembayaran']; ?></td>
                            <td><?php echo $data['item_pembayaran']; ?></td>
                            <td><?php echo $data['jumlah_pembayaran']; ?></td>
                            <td><?php echo $data['subtotal']; ?></td>
                            <td>
                                <a href="<?php echo base_url('detailpembayaran/detailpembayaran_update/') . $data['id_detail_pembayaran']; ?>"> <i class="fas fa-pencil-alt"></i> </a>
                                <a href="<?php echo base_url('detailpembayaran/detailpembayaran_delete/') . $data['id_detail_pembayaran']; ?>" onclick="return confirm('Yakin menghapus detail pembayaran?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>
</div>