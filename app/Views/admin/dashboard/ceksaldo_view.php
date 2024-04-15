<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
<div class="pr-5 pl-5 mt-2">
    <form method="GET" action="<?=base_url('/ceksaldo')?>" class="mb-5">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="db">Pilih Database</label>
                <select name="db" class="form-control">
                    <option value="">-- Choose --</option>
                    <option value="ra" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>Replica Amazone</option>
                    <option value="re" <?=@$_GET['db'] === "re" ? "selected" : ''?>>Replica EPS</option>
                    <option value="da" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos Amazone</option>
                    <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos EPS</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="table-responsive">
        <a href="" onclick=f5()>refresh page...</a>
        <br>
        <?php
      $isToday = time();
      $isDate = date("Y-m-d", strtotime('+7 hours', $isToday));
      $isTime = date("H:i:s", strtotime('+7 hours', $isToday));
    ?>
        Total pemakaian deposit hari ini <?php echo $isDate ?> jam 00:00:00 sampai dengan <?php echo $isTime ?>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th>Label</th>
                    <th>Total Transaksi</th>
                    <th>Pemakaian Saldo</th>
                    <th>Saldo Sekarang</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
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
setInterval(function() {
    window.location.reload();
}, 60000); // Adjust the interval time as needed

function f5() {
    window.location.reload();
}
</script>
<?php $this->endSection() ?>