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
                <form method="POST" action="<?php echo base_url('detailpembayaran/detailpembayaran_update/' . $d['id_detail_pembayaran']); ?>" class="form-horizontal">

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="id_pembayaran" class="col-sm-2 col-form-label">ID Pembayaran</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_pembayaran" id="id_pembayaran">
                                    <?php foreach ($ddpembayaran as $id_pembayaran => $tgl_pembayaran) { ?>
                                        <option value="<?php echo $id_pembayaran; ?>" <?php if ($d['id_pembayaran'] == $id_pembayaran) echo 'selected'; ?>><?php echo $tgl_pembayaran; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('id_pembayaran')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="item_pembayaran" class="col-sm-2 col-form-label">Item Pembayaran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="item_pembayaran" id="item_pembayaran" value="<?php echo set_value('item_pembayaran', $d['item_pembayaran']); ?>" placeholder="Masukkan Item Pembayaran">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('item_pembayaran')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_pembayaran" class="col-sm-2 col-form-label">Jumlah Pembayaran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jumlah_pembayaran" id="jumlah_pembayaran" value="<?php echo set_value('jumlah_pembayaran', $d['jumlah_pembayaran']); ?>" placeholder="Masukkan Jumlah Pembayaran">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('jumlah_pembayaran')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subtotal" class="col-sm-2 col-form-label">Subtotal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subtotal" id="subtotal" value="<?php echo set_value('subtotal', $d['subtotal']); ?>" placeholder="Masukkan Subtotal">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('subtotal')); ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
