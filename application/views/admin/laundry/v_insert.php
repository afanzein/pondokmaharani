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
                <h3 class="card-title">Isikan Data Dengan Benar</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('laundry/laundry_insert'); ?>" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id_pemesanan" class="col-sm-2 col-form-label">Pemesanan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_pemesanan" id="id_pemesanan">
                                    <?php foreach ($ddpemesanan as $id => $nik) { ?>
                                        <option value="<?php echo $id; ?>"><?php echo $nik; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('id_pemesanan')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Masukkan Harga Satuan">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('harga_satuan')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_laundry" class="col-sm-2 col-form-label">Jumlah Laundry</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jumlah_laundry" id="jumlah_laundry" placeholder="Masukkan Jumlah Laundry">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('jumlah_laundry')); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subtotal" class="col-sm-2 col-form-label">Subtotal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subtotal" id="subtotal" placeholder="Masukkan Subtotal">
                                <span class="badge badge-warning"><?php echo strip_tags(form_error('subtotal')); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>

                    <script>
                        // Get the input elements
                        const num1Input = document.getElementById('harga_satuan');
                        const num2Input = document.getElementById('jumlah_laundry');
                        const resultInput = document.getElementById('subtotal');

                        // Add event listeners for input changes
                        num1Input.addEventListener('input', calculate);
                        num2Input.addEventListener('input', calculate);

                        function calculate() {
                        // Get the values from the input elements
                        const num1 = parseFloat(num1Input.value);
                        const num2 = parseFloat(num2Input.value);

                        // Perform the calculation
                        const result = num1 * num2;

                        // Update the result input element
                        resultInput.value = isNaN(result) ? '' : result;
                        }
                    </script>
            </div>
        </div>
    </section>
</div>
