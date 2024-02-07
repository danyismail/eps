<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
  <div class="pr-5 pl-5 mt-2">
    <div class="row">
      <div class="col-md-12">
      </div>
    </div>

    <div class="table-responsive">
    <?php 
      $nowTime = date("H:i:s", strtotime('+7 hours', time()));
      $startOfDay = strtotime('today');
    ?>
    <h4>Total pemakaian deposit hari ini dari pukul : <?php echo date('H:i:s', $startOfDay) ?> sampai : <?php echo $nowTime ?></h4>
    <table class="table table-bordered">
        <thead>
          <tr class="bg-success text-white">
          <th>Kode Modul</th>
          <th>Label</th>
          <th>Total Transaksi</th>
          <th>Pemakaian Saldo</th>
          <th>Saldo Sekarang</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                  <td><?=$row['kode_modul']?></td>
                  <td><?=$row['label']?></td>
                  <td><?=$row['total_transaksi']?></td>
                  <td><?=number_format($row['pemakaian_saldo'])?></td>
                  <td><?=number_format($row['saldo_sekarang'])?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
        // Reload the page every 5 seconds (5000 milliseconds)
        setInterval(function(){
            window.location.reload();
        }, 60000); // Adjust the interval time as needed
    </script>
<?php $this->endSection() ?>
