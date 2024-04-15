<?php $this->extend('admin/layout/template_finance') ?>
<?php $this->Section('content') ?>
<div class="mt-2">
    <form method="GET" action="<?=base_url('/supplier')?>" class="mb-5">
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
        <a href="<?=base_url('/supplier/add')?>" class="btn btn-primary mb-2 float-right">Add Item</a>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th width="10">ID</th>
                    <th width="30%">Name</th>
                    <th>Status</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?=$row['ID']?></td>
                    <td><?=$row['name']?></td>
                    <td>
                        <button class="btn <?=$row['status'] === 'active' ? 'btn-success' : 'btn-warning'?>">
                            <?=$row['status'] === 'active' ? 'Aktif' : 'Non-Aktif'?>
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-default text-info"
                            href="<?=base_url('/supplier/status?id='.$row['ID'].'&q=inactive&db='.@$_GET['db'])?>">Non
                            Aktifkan</a> |
                        <a class="btn btn-default text-info"
                            href="<?=base_url('/supplier/status?id='.$row['ID'].'&q=active&db='.@$_GET['db'])?>">Aktifkan</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>