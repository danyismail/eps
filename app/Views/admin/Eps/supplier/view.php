<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
  <div class="pr-5 pl-5 mt-2">
    <div class="table-responsive bg-white pb-3 p-2">
      <a href="<?=base_url('/eps/supplier/add')?>" class="btn btn-success mb-2">Add Item</a>
      <table class="table table-bordered">
        <thead>
          <tr class="bg-info text-white">
            <th width="10">ID</th>
            <th width="30%">Name</th>
            <th>Status</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                    <td><?=$row['ID']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['status']?></td>
                    <td>
                      <a class="btn btn-warning text-white" href="<?=base_url('/eps/supplier/edit?id='.$row['ID'])?>">Edit</a>
                      <a class="btn btn-danger text-white" href="<?=base_url('/eps/supplier/delete?id='.$row['ID'])?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $this->endSection() ?>
