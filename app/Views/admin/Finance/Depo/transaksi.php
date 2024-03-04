<?php $this->extend('admin/layout/templateFinance') ?>
<?php $this->Section('content') ?>
  <div class="pr-5 pl-5 mt-5">
    <div class="table-responsive bg-white pb-3 p-2">
      <table class="table table-bordered">
        <thead>
          <tr class="bg-info text-white">
            <th width="10">ID</th>
            <th width="20%">Name</th>
            <th width="10%">Supplier</th>
            <th width="10%">Amount</th>
            <th width="10%">Rekening Asal</th>
            <th>Rekening Tujuan</th>
            <th>Image</th>
            <th>Reply</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['supplier']?></td>
                    <td><?=$row['amount']?></td>
                    <td><?=$row['origin_account']?></td>
                    <td><?=$row['destination_account']?></td>
                    <td><?=$row['image_upload']?></td>
                    <td><?=$row['reply']?></td>
                    <td>
                        <a class="btn btn-default text-info">Reply</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $this->endSection() ?>
