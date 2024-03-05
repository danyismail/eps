<?php $this->extend('admin/layout/templateFinance') ?>
<?php $this->Section('content') ?>
  <div class="mt-2">
    <div class="table-responsive bg-white pb-3 p-2">
      <a href="<?=base_url('finance/supplier/eps/add')?>" class="btn btn-primary mb-2 float-right">Add Item</a>
      <table class="table table-bordered">
        <thead>
          <tr class="bg-info text-white">
            <th width="10">No</th>
            <th width="30%">Nama</th>
            <th>Status</th>
            <th width="20%">Opsi</th>
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
                      <a class="btn btn-default text-info" href="<?=base_url('/finance/supplier/eps/status?id='.$row['ID'].'&q=inactive')?>">Non Aktifkan</a> |
                      <a class="btn btn-default text-info" href="<?=base_url('/finance/supplier/eps/status?id='.$row['ID'].'&q=active')?>">Aktifkan</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $this->endSection() ?>
