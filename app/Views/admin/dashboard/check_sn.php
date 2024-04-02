<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>


<!-- Example single danger button -->
<div class="dropdown">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Database
  </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="<?=base_url('/sn/ra/list')?>">Replica Amazone</a>
        <a class="dropdown-item" href="<?=base_url('/sn/re/list')?>">Replica EPS</a>
        <a class="dropdown-item" href="<?=base_url('/sn/da/list')?>">Digipos Amazone</a>
        <a class="dropdown-item" href="<?=base_url('/sn/de/list')?>">Digipos EPS</a>
    </div>
</div>
<div class="mt-3">
    <span class="badge badge-pill badge-danger">SN Null</span>
</div>
  <div class="mt-1">
    <div class="table-responsive bg-white pb-3 p-2">
      <table class="table table-bordered">
        <thead>
          <tr class="bg-info text-white">
            <th>No</th>
            <th>Kode Reseller</th>
            <th>Kode Produk</th>
            <th>Tujuan</th>
            <th>Tgl Entri</th>
            <th>Tgl Status</th>
            <th>SN</th>
            <th>Selisih Waktu</th>
          </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            <?php foreach($nullableSN as $row): ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row['kode_reseller']?></td>
                    <td><?=$row['kode_produk']?></td>
                    <td><?=$row['tujuan']?></td>
                    <td><?=$row['tgl_entri']?></td>
                    <td><?=$row['tgl_status']?></td>
                    <td><?=$row['sn']?></td>
                    <td><?=$row['selisih_waktu']?></td>
                </tr>
            <?php endforeach ?>
            <?php if(count($nullableSN) === 0) { ?>
              <tr>
                <td colspan="7" class="text-center">Tidak Ada Data</td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3">
    <span class="badge badge-pill badge-danger">SN Duplikat</span>
  </div>

  <div class="mt-1">
    <div class="table-responsive bg-white pb-3 p-2">
      <table class="table table-bordered">
        <thead>
          <tr class="bg-info text-white">
            <th>No</th>
            <th>SN Tujuan</th>
            <th>Tujuan</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            <?php foreach($duplicateSN as $row): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?=$row['sn']?></td>
                    <td><?=$row['tujuan']?></td>
                    <td><?=$row['total']?></td>
                </tr>
            <?php endforeach ?>
            <?php if(count($duplicateSN) === 0) { ?>
              <tr>
                <td colspan="10" class="text-center">Tidak Ada Data</td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <img src="" alt="" id="imageModal" class="w-100">
        </div>
      </div>
    </div>
  </div>

<?php $this->endSection() ?>