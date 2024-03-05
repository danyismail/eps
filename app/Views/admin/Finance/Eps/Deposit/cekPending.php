<?php $this->extend('admin/layout/templateFinance') ?>
<?php $this->Section('content') ?>
  <div class="pr-5 pl-5 mt-2">
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($dataCreated as $row): ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['supplier']?></td>
                    <td><?=$row['amount']?></td>
                    <td><?=$row['origin_account']?></td>
                    <td><?=$row['destination_account']?></td>
                    <td>
                      <a href="<?=base_url('/finance/deposit/eps/add_image/'.$row['id'])?>" class="btn btn-success text-white">Upload Image</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

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
            <th>Reply</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($dataUpload as $row): ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['supplier']?></td>
                    <td><?=$row['amount']?></td>
                    <td><?=$row['origin_account']?></td>
                    <td><?=$row['destination_account']?></td>
                    <td><?=$row['reply']?></td>
                    <td><img src="<?=getenv('API_HOST')."/api/finance/e/image/".$row['id']?>" width="100" alt=""></td>
                    <td>
                        <a href="<?=base_url('/finance/deposit/eps/add_reply/'.$row['id'])?>" class="btn btn-success text-white">Reply Provider</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $this->endSection() ?>