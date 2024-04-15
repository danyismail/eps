<?php $this->extend('admin/layout/template_finance') ?>
<?php $this->Section('content') ?>
<div class="mt-1">
    <form method="GET" action="<?=base_url('deposit/cek_pending')?>" class="mb-5">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="db">Pilih Database</label>
                <select name="db" class="form-control">
                    <option value="">-- Choose --</option>
                    <option value="da" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos Amazone</option>
                    <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos EPS</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="table-responsive bg-white pb-3 p-2">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th width="10">ID</th>
                    <th width="15%">Tanggal Entry</th>
                    <th width="20%">Name</th>
                    <th width="10%">Supplier</th>
                    <th width="10%">Amount</th>
                    <th width="10%">Rekening Asal</th>
                    <th>Rekening Tujuan</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dataCreated as $row): ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['created_at']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['supplier']?></td>
                    <td><?=number_format($row['amount'], 0, ",", ".");?></td>
                    <td><?=$row['origin_account']?></td>
                    <td><?=$row['destination_account']?></td>
                    <td>
                        <a href="<?=base_url('/deposit/'.$pathDB.'/form_upload/'.$row['id'])?>">Upload Image</a>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php if(count($dataCreated) === 0) { ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak Ada Data</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-1">
    <div class="table-responsive bg-white pb-3 p-2">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th width="10">ID</th>
                    <th width="15%">Tanggal Entry</th>
                    <th width="20%">Name</th>
                    <th width="10%">Supplier</th>
                    <th width="10%">Amount</th>
                    <th width="10%">Rekening Asal</th>
                    <th>Rekening Tujuan</th>
                    <th>Reply</th>
                    <th>Image</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dataUpload as $row): ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['created_at']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['supplier']?></td>
                    <td><?=number_format($row['amount'], 0, ",", ".");?></td>
                    <td><?=$row['origin_account']?></td>
                    <td><?=$row['destination_account']?></td>
                    <td><?=$row['reply']?></td>
                    <td><a href="<?=getenv('API_HOST')."/deposit/$pathDB/image/".$row['id']?>" class="load-image">Show
                            Image</a></td>
                    <td>
                        <a href="<?=base_url('/deposit/'.$pathDB.'/add_reply/'.$row['id'])?>">Upload Bukti</a>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php if(count($dataUpload) === 0) { ?>
                <tr>
                    <td colspan="10" class="text-center">Tidak Ada Data</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="" id="imageModal" class="w-100">
            </div>
        </div>
    </div>
</div>

<script>
$('.load-image').click(function(e) {
    e.preventDefault();
    $('#imageModal').attr('src', $(this).attr('href'))
    $('#myModal').modal('show')
})
</script>
<?php $this->endSection() ?>