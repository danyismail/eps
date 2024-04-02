<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
<div class="pr-5 pl-5 mt-2">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>

    <div class="table-responsive">
        <a href="" onclick=f5()>refresh page...</a>
        <br>
        <?php 
          $isToday = time();   
          $isDate = date("Y-m-d", strtotime('+7 hours', $isToday));
          $isTime = date("H:i:s", strtotime('+7 hours', $isToday));
        ?>
        Total penjualan hari ini <?php echo $isDate ?> jam 00:00:00 sampai dengan <?php echo $isTime ?>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th>Trx</th>
                    <th>Pembelian</th>
                    <th>Penjualan</th>
                    <th>Laba</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?=$row['trx']?></td>
                    <td><?=number_format($row['pembelian'])?></td>
                    <td><?=number_format($row['penjualan'])?></td>
                    <td><?=number_format($row['laba'])?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
// Reload the page every 5 seconds (5000 milliseconds)
setInterval(function() {
    window.location.reload();
}, 60000); // Adjust the interval time as needed

function f5() {
    window.location.reload();
}
</script>
<?php $this->endSection() ?>