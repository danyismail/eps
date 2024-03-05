<?php $this->extend('admin/layout/templateFinance') ?>
<?php $this->Section('content') ?>
  <div class="mt-1">
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
                    <td><?=number_format($row['amount'], 0, ",", ".");?></td>
                    <td><?=$row['origin_account']?></td>
                    <td><?=$row['destination_account']?></td>
                    <td>
                      <a href="<?=base_url('/finance/deposit/amz/add_image/'.$row['id'])?>" class="btn btn-success text-white">Upload Image</a>
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
                    <td><?=number_format($row['amount'], 0, ",", ".");?></td>
                    <td><?=$row['origin_account']?></td>
                    <td><?=$row['destination_account']?></td>
                    <td><?=$row['reply']?></td>
                    <td><img src="<?=getenv('API_HOST')."/api/finance/a/image/".$row['id']?>" width="100" alt="" class="load-image"></td>
                    <td>
                        <a href="<?=base_url('/finance/deposit/amz/add_reply/'.$row['id'])?>" class="btn btn-success text-white">Upload Bukti</a>
                    </td>
                </tr>
            <?php endforeach ?>
            <?php if(count($dataUpload) === 0) { ?>
              <tr>
                <td colspan="9" class="text-center">Tidak Ada Data</td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <img src="" alt="" id="imageModal" class="w-100">
        </div>
      </div>
    </div>
  </div>

  <script>
    $('.load-image').click(function(){
      $('#imageModal').attr('src', $(this).attr('src'))
      $('#myModal').modal('show')
    })
  </script>
<?php $this->endSection() ?>