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

        <form method="POST" action="<?php echo base_url('pembayaran/pembayaran_insert'); ?>" class="form-horizontal">

          <div class="card-body">

            <div class="form-group row">
              <label for="id_pemesanan" class="col-sm-2 col-form-label">ID Pemesanan</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_pemesanan" id="id_pemesanan">
                  <?php foreach ($ddpemesanan as $id_pemesanan => $nik_tamu) { ?>
                    <option value="<?php echo $id_pemesanan; ?>"><?php echo $nik_tamu; ?></option>
                  <?php } ?>
                </select>
                <span class="badge badge-warning"><?php echo strip_tags(form_error('id_pemesanan')); ?></span>
              </div>
            </div>

            <div class="form-group row">
              <label for="tgl_pembayaran" class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_pembayaran" id="tgl_pembayaran">
                <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_pembayaran')); ?></span>
              </div>
            </div>

            <div class="form-group row">
              <label for="total_pembayaran" class="col-sm-2 col-form-label">Total Pembayaran</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="total_pembayaran" id="total_pembayaran" placeholder="Masukkan Total Pembayaran">
                <span class="badge badge-warning"><?php echo strip_tags(form_error('total_pembayaran')); ?></span>
              </div>
            </div>

            <div class="form-group row">
              <label for="status_pembayaran" class="col-sm-2 col-form-label">Status Pembayaran</label>
              <div class="col-sm-10">
                <select class="form-control" name="status_pembayaran" id="status_pembayaran">
                <option value="-Pilih-">-Pilih-</option>  
                  <option value="Sukses">Sukses</option>
                  <option value="Belum Sukses">Belum Sukses</option>
                </select>
                <span class="badge badge-warning"><?php echo strip_tags(form_error('status_pembayaran')); ?></span>
              </div>
            </div>

          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
          </div>
        </form>


      </div>
  </section>
</div>
