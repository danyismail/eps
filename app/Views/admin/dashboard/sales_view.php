<?php $this->extend('admin/layout/template_new') ?>
<?php $this->Section('content') ?>
<div class="pr-5 pl-5 mt-2">
    <div class="row mb-3">
        <div class="form-group col-md-3">
            <label for="db">Pilih Database</label>
            <select class="form-control"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Select...</option>
                <option value="<?=base_url('penjualan?db=ra')?>" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>Replica
                    Amazone</option>
                <option value="<?=base_url('penjualan?db=re')?>" <?=@$_GET['db'] === "re" ? "selected" : ''?>>Replica
                    EPS</option>
                <option value="<?=base_url('penjualan?db=da')?>" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos
                    Amazone</option>
                <option value="<?=base_url('penjualan?db=da')?>" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos
                    EPS</option>
            </select>
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
                    <td><?=FormatNumber($row['trx'])?></td>
                    <td><?=FormatNumber($row['pembelian'])?></td>
                    <td><?=FormatNumber($row['penjualan'])?></td>
                    <td><?=FormatNumber($row['laba'])?></td>
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