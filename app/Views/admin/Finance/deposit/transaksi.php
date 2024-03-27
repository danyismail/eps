<?php $this->extend('admin/layout/templateFinance') ?>
<?php $this->Section('content') ?>
  <div class="mt-1">
  <div class="row">
      <div class="col-md-12">
        <form method="GET" action="<?=base_url('/finance/deposit/amz/data_transaksi')?>" class="mb-2 mt-2">
            <div class="row mb-2 mt-2">
              <div class="form-group col-md-3">
                <label for="StartDate">Start Date</label>
                <input type="text" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>" />
              </div>
              <div class="form-group col-md-3">
                <label for="endDt">End Date</label>
                <input type="text" name="endDt" class="form-control" value="<?=@$_GET['endDt']?>" />
              </div>
              <div class="form-group col-md-3 pt-2">
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
              </div>
            </div>
        </form>
      </div>
    </div>
    <div class="bg-white pb-3 p-2 pt-0">
      <table class="table table-bordered">
        <thead>
          <tr class="bg-info text-white">
            <th width="10">ID</th>
            <th width="400">Tanggal Entry</th>
            <th width="400">Tanggal Status</th>
            <th width="200">Name</th>
            <th width="100">Supplier</th>
            <th width="100">Amount</th>
            <th width="100">Status</th>
            <th width="100">Rekening Asal</th>
            <th>Rekening Tujuan</th>
            <th>Image</th>
            <th>Reply</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['created_at']?></td>
                    <td><?=$row['updated_at']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['supplier']?></td>
                    <td><?=number_format($row['amount'], 0, ",", ".");?></td>
                    <td><?=$row['status']?></td>
                    <td><?=$row['origin_account']?></td>
                    <td><?=$row['destination_account']?></td>
                    <td><img src="<?=getenv('API_HOST')."/api/finance/a/image/".$row['id']?>" width="100" alt="" class="load-image"></td>
                    <td><?=$row['reply']?></td>
                </tr>
            <?php endforeach ?>
            <?php if(count($data) === 0) { ?>
              <tr>
                <td colspan="8" class="text-center">Tidak Ada Data</td>
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
