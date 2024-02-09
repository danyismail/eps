<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
  <div class="pr-5 pl-5 mt-2">
    <div class="row">
      <div class="col-md-12">
      </div>
    </div>

    <div class="table-responsive">
    <?php 
      $current_time = time();   
      $new_date = date("Y-m-d", strtotime('+7 hours', $current_time));
      $new_time = date("H:i:s", strtotime('+7 hours', $current_time));
    ?>
    Total penjualan hari ini  <?php echo $new_date ?> jam 00:00:00 sampai dengan <?php echo $new_time ?>
    <table class="table table-bordered">
        <thead>
          <tr class="bg-success text-white">
          <th>MA</th>
          <th>Trx</th>
          <th>Pembelian</th>
          <th>Penjualan</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                  <td><?=$row['ma']?></td>
                  <td><?=$row['trx']?></td>
                  <td><?=number_format($row['pembelian'])?></td>
                  <td><?=number_format($row['penjualan'])?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $this->endSection() ?>
