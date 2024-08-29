<?php $this->extend('layout/template_finance') ?>
<?php $this->Section('content') ?>
<div class="mt-2">
    <div class="table-responsive bg-white pb-3 p-2">
        <!-- <div class="row mb-3">
            <div class="col-md-3">
                <label for="db">Pilih Database</label>
                <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="">Select...</option>
                    <option value="<?=base_url('supplier?db=da')?>" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos Amazone</option>
                    <option value="<?=base_url('supplier?db=de')?>" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos EPS</option>
                </select>
            </div>
        </div> -->
        
        <div class="mb-3">
            <a href="<?=base_url('/supplier/add')?>" class="btn btn-primary mb-2 float-rightx">Add Item</a>
        </div>
        <table id="datatablesSimple">
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