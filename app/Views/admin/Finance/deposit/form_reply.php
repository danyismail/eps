<?php $this->extend('admin/layout/templateFinance') ?>
<?php $this->Section('content') ?>
<div class="pr-5 pl-5 mt-2">
    <div class="table-responsive bg-white p-3">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <?php 
                  $currentUri = $_SERVER['REQUEST_URI'];
                  $currentUri = ltrim($currentUri, '/');
                  $uriSegments = explode('/', $currentUri);
                  $path = $uriSegments[1];
                ?>
                <form action="<?=base_url('/deposit/'.$path.'/action_reply')?>" enctype="multipart/form-data"
                    method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="formGroupExampleInput">PIC</label>
                            <input type="hidden" class="form-control" name="id" readonly value="<?=$data["id"]?>">
                            <input type="text" class="form-control" placeholder="PIC" name="pic" readonly
                                value="<?=$data["name"]?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="inputState">Supplier</label>
                            <input type="text" class="form-control" placeholder="Supplier" name="supplier" readonly
                                value="<?=$data["supplier"]?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="formGroupExampleInput">Nominal Depo</label>
                            <input type="number" class="form-control" placeholder="Nominal Depo" name="nominal_depo"
                                readonly value="<?=$data["amount"]?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="formGroupExampleInput">Rekening Asal</label>
                            <input type="text" class="form-control" placeholder="Rekening Asal" name="origin_account"
                                readonly value="<?=$data["origin_account"]?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Rekening Tujuan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="rekening_tujuan" readonly><?=$data["destination_account"]?></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="formGroupExampleInput">Upload Gambar</label>
                            <div><img src="<?=getenv('API_HOST')."/api/finance/e/image/".$data['id']?>" width="200"
                                    alt=""></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Reply</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="reply"><?=$data["reply"]?></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <button type="submit" class="btn btn-primary mt-3 float-right">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>