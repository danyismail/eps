<?php $this->extend('layout/template_finance') ?>
<?php $this->Section('content') ?>
<div class="pl-md-5 mt-2">
    <div class="table-responsive bg-white p-3">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9 col-sm-12">
                <form action="<?=base_url('/deposit/create')?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-7 col-sm-12">
                            <label for="db">Pilih Database</label>
                            <select name="db" class="form-control" id="selectDB">
                                <option value="">-- Choose --</option>
                                <option value="da" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos Amazone</option>
                                <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos EPS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="formGroupExampleInput">PIC</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="PIC"
                                name="pic" required>
                        </div>
                    </div>
                    <div class="form-row mt-1">
                        <div class="form-group col-md-7">
                            <label for="inputSupplier">Supplier</label>
                            <select id="inputSupplier" class="form-control" name="supplier" required>
                                <option value="">-- Choose --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-1">
                        <div class="form-group col-md-7">
                            <label for="formGroupExampleInput">Nominal Depo</label>
                            <input type="number" class="form-control" id="formGroupExampleInput"
                                placeholder="Nominal Depo" name="nominal_depo" required>
                        </div>
                    </div>
                    <div class="form-row mt-1">
                        <div class="form-group col-md-7">
                            <label for="formGroupExampleInput">Rekening Asal</label>
                            <div class="form-check ml-10">
                                <input class="form-check-input" type="radio" name="origin" value="BCA" id="bank1"
                                    checked>
                                <label class="form-check-label" for="bank1">BCA</label>
                            </div>
                            <div class="form-check ml-10">
                                <input class="form-check-input" type="radio" name="origin" value="BNI" id="bank2">
                                <label class="form-check-label" for="bank2">BNI</label>
                            </div>
                            <div class="form-check ml-10">
                                <input class="form-check-input" type="radio" name="origin" value="BRI" id="bank3">
                                <label class="form-check-label" for="bank3">BRI</label>
                            </div>
                            <div class="form-check ml-10">
                                <input class="form-check-input" type="radio" name="origin" value="MANDIRI" id="bank4">
                                <label class="form-check-label" for="bank4">MANDIRI</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-1">
                        <div class="form-group col-md-7">
                            <label for="exampleFormControlTextarea1" class="form-label">Rekening Tujuan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="rekening_tujuan" required></textarea>
                        </div>
                    </div>
                    <div class="text-danger mt-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Data yang sudah berhasil tersimpan
                            tidak usah di ulang!</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#selectDB').change(function(){
            let val = $(this).val();
            loadData(val)
        });

        function loadData(val) {
            $('#inputSupplier').html('<option value="">-- Choose --</option>');
            $.ajax({
                type: "POST",
                url: "<?=base_url('/deposit/getsupplier')?>",
                data: {db: val},
                cache: false,
                success: function(data){
                    const getJSON = JSON.parse(data)
                    $.each(getJSON.supplier, function (i, item) {
                        $('#inputSupplier').append($('<option>')
                            .val(item.name).text(item.name));
                    });
                }
            });
        }
    })
</script>
<?php $this->endSection() ?>