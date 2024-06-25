<?php $this->extend('layout/template_saleshub') ?>
<?php $this->Section('content') ?>
<div class="mt-2">
    <div class="table-responsive bg-white pb-3 p-2">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="<?=base_url('/saleshub/total_revenue')?>" class="mb-5">
                    <div class="row mb-4">
                        <div class="form-group col-md-3 mt-2">
                            <label for="StartDate">Start Date</label>
                            <input type="date" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>" />
                        </div>
                        <div class="form-group col-md-3 mt-2">
                            <label for="endDt">End Date</label>
                            <input type="date" name="endDt" class="form-control" value="<?=@$_GET['startDt'] === 'yesterday' ? '' : @$_GET['endDt']?>" />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-md-3">
                            <input type="radio" name="startDt" value="yesterday" <?=@$_GET['startDt'] === 'yesterday' ? 'checked' : ''?> >
                            <label for="html">Yesterday</label><br>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
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