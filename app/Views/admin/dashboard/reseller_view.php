<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>

<div class="pr-5 pl-5 mt-2">
    <div class="dropdown">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Pilih Database
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?=base_url('/reseller/ra/laba')?>">Replica Amazone</a>
            <a class="dropdown-item" href="<?=base_url('/reseller/re/laba')?>">Replica EPS</a>
            <a class="dropdown-item" href="<?=base_url('/reseller/da/laba')?>">Digipos Amazone</a>
            <a class="dropdown-item" href="<?=base_url('/reseller/de/laba')?>">Digipos EPS</a>
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
                    <div class="form-group col-md-3">
                        <label for="id">Kode Reseller</label> <label class="text-danger">*wajib input kode
                            reseller</label>
                        <input type=" text" name="id" class="form-control" value="<?=@$_GET['id']?>" />
                    </div>
                </div>
                <button type="submit" class="btn btn-info mt-2">Submit</button>
            </form>
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class=" table table-bordered">
            <tr>
                <td>Reseller</td>
                <td><?=$data2['nama']?></td>
            </tr>
            <tr>
                <td>Total Transaksi</td>
                <td><?=number_format($data2['trx'],0, '.', '.')?></td>
            </tr>
            <tr>
                <td>Total Laba</td>
                <td><?=number_format($data2['laba'],0, '.', '.')?></td>
            </tr>
            <?php if(count($data) === 0) { ?>
            <tr>
                <td colspan="3" class="text-center">Tidak Ada Data</td>
            </tr>
            <?php } ?>
        </table>
        <table class=" table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th>Kode Produk</th>
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
                <?php if(count($data) === 0) { ?>
                <tr>
                    <td colspan="3" class="text-center">Tidak Ada Data</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>