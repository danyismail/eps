<?php $this->extend('layout/template_saleshub') ?>
<?php $this->Section('content') ?>
<div class="mt-2">
    <div class="table-responsive bg-white pb-3 p-2">
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="db">Filter</label>
                <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="">Select...</option>
                    <option value="?startDt=yesterday" <?=@$_GET['startDt'] === "yesterday" ? "selected" : ''?>>Yesterday</option>
                </select>
            </div>
        </div>
        
        <table id="datatablesSimple" class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th width="10">Server</th>
                    <th>MA</th>
                    <th>TRX</th>
                    <th>Penjualan</th>
                    <th>Pembelian</th>
                    <th>Tekor</th>
                    <th>Bakar</th>
                    <th>Laba</th>
                    <th>Komisi</th>
                    <th>PPN (11%)</th>
                    <th>PPH22</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?=$row['server']?></td>
                    <td><?=$row['member']?></td>
                    <td></td>
                    <td><?=$row['penjualan']?></td>
                    <td><?=$row['pembelian']?></td>
                    <td><?=$row['tekor']?></td>
                    <td><?=$row['bakar']?></td>
                    <td><?=$row['laba']?></td>
                    <td><?=$row['komisi']?></td>
                    <td><?=$row['ppn11']?></td>
                    <td><?=$row['pph22']?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>