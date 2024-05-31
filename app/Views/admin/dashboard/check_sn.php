<?php $this->extend('admin/layout/template_new') ?>
<?php $this->Section('content') ?>

<!-- <div class="mt-3">
    <span class="badge badge-pill badge-danger">SN Null</span>
</div> -->

<div class="mt-1">
    <div class="row mb-3">
        <div class="form-group col-md-3">
            <label for="db">Pilih Database</label>
            <select class="form-control"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Select...</option>
                <?php $session = session(); ?>
                <?php if(in_array($session->get('data')['role'], ['amazone', 'superadmin'] )) {?>
                    <option value="<?=base_url('sn/ra/list')?>" <?=(uri_string() === 'sn/ra/list') ? 'selected' : ''?>>
                        Replica Amazone
                </option>
                <?php } ?>
                
                <?php if(in_array($session->get('data')['role'], ['eps', 'superadmin'] )) {?>
                    <option value="<?=base_url('sn/re/list')?>" <?=(uri_string() === 'sn/re/list') ? 'selected' : ''?>>
                        Replica EPS
                    </option>
                <?php } ?>
                
                <?php if(in_array($session->get('data')['role'], ['amazone', 'superadmin'] )) {?>
                    <option value="<?=base_url('sn/da/list')?>" <?=(uri_string() === 'sn/da/list') ? 'selected' : ''?>>
                        Digipos Amazone
                    </option>
                <?php } ?>
                
                <?php if(in_array($session->get('data')['role'], ['eps', 'superadmin'] )) {?>
                    <option value="<?=base_url('sn/de/list')?>" <?=(uri_string() === 'sn/de/list') ? 'selected' : ''?>>
                        Digipos EPS
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th>No</th>
                    <th class="text-nowrap">Kode Reseller</th>
                    <th class="text-nowrap">Kode Produk</th>
                    <th>Tujuan</th>
                    <th class="text-nowrap">Tgl Entri</th>
                    <th class="text-nowrap">Tgl Status</th>
                    <th>Supplier</th>
                    <th>SN</th>
                    <th class="text-nowrap">Selisih Waktu</th>
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
                    <td><?=$row['supplier']?></td>
                    <td><?=$row['sn']?></td>
                    <td><?=$row['selisih_waktu']?></td>
                </tr>
                <?php endforeach ?>
                <?php if(count($nullableSN) === 0) { ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak Ada Data</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-1">
    <div class="table-responsive bg-white mt-4">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th>No</th>
                    <th class="text-nowrap">SN Tujuan</th>
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
                    <td colspan="4" class="text-center">Tidak Ada Data</td>
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