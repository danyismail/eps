<?php $this->extend('admin/layout/template_new') ?>
<?php $this->Section('content') ?>

<div class="pr-5 pl-5 mt-2">
    <div class="row mb-3">
        <div class="form-group col-md-3">
            <label for="db">Pilih Database</label>
            <select class="form-control"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Select...</option>
                <option value="<?=base_url('reseller/ra/laba')?>"
                    <?=(uri_string() === 'reseller/ra/laba') ? 'selected' : ''?>>Replica Amazone</option>
                <option value="<?=base_url('reseller/re/laba')?>"
                    <?=(uri_string() === 'reseller/re/laba') ? 'selected' : ''?>>Replica EPS</option>
                <option value="<?=base_url('reseller/da/laba')?>"
                    <?=(uri_string() === 'reseller/da/laba') ? 'selected' : ''?>>Digipos Amazone</option>
                <option value="<?=base_url('reseller/de/laba')?>"
                    <?=(uri_string() === 'reseller/de/laba') ? 'selected' : ''?>>Digipos EPS</option>
            </select>
        </div>
    </div>
    <div class="mt-3"></div>
    <div class="row">
        <div class="col-md-12">
            <?php 
          $currentUri = $_SERVER['REQUEST_URI'];
          $currentUri = ltrim($currentUri, '/');
          $uriSegments = explode('/', $currentUri);
          $path = $uriSegments[1];
        ?>
            <form method="GET" action="<?=base_url('/reseller/'.$path.'/laba')?>" class="mb-5">
                <div class="row mb-1">
                    <div class="form-group col-md-3">
                        <label for="StartDate">Start Date</label>
                        <input type="date" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="endDt">End Date</label>
                        <input type="date" name="endDt" class="form-control" value="<?=@$_GET['endDt']?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id">Kode Reseller</label> <span class="text-danger">*wajib input kode
                            reseller</span>
                        <select id="singleSelect" class="js-states form-control" name="id">
                            <?php foreach($reseller as $row): ?>
                            <option value="<?=$row['kode']?>" <?=@$_GET['id'] === $row['kode'] ? 'selected' : ''?>>
                                <?=$row['kode']?> - <?=$row['nama']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info mt-2">Submit</button>
            </form>
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-bordered">
            <tr>
                <td>Reseller</td>
                <td><?=@$data2['nama']?></td>
            </tr>
            <tr>
                <td>Total Transaksi</td>
                <td><?=FormatNumber(@$data2['trx'])?></td>
            </tr>
            <tr>
                <td>Total Penjualan</td>
                <td><?=FormatNumber(@$data2['jual'])?></td>
            </tr>
            <tr>
                <td>Total Pembelian</td>
                <td><?=FormatNumber(@$data2['beli'])?></td>
            </tr>
            <tr>
                <td>Total Laba</td>
                <td><?=FormatNumber(@$data2['laba'])?></td>
            </tr>
            <?php if(count($data) === 0) { ?>
            <tr>
                <td colspan="3" class="text-center">Tidak Ada Data</td>
            </tr>
            <?php } ?>
        </table>
        <table class="table" id="datatablesSimple">
            <thead>
                <tr class="bg-info text-white">
                    <th width="40%">Kode Produk</th>
                    <th>Trx</th>
                    <th>Laba</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?=$row['kode_produk']?></td>
                    <td><?=number_format($row['trx'],0, '.', '.')?></td>
                    <td><?=number_format($row['laba'],0, '.', '.')?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>