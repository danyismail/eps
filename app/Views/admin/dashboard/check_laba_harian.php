<?php $this->extend('admin/layout/template_new') ?>
<?php $this->Section('content') ?>
<div class="bg-white mb-3 mt-3 table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th width="1%"></th>
                <?php foreach ($labaHarian as $group) { ?>
                <th scope="col" class="text-center"><?=$group[0]['tanggal']?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table class="table table-bordered">
                        <thead>
                            <th>Jam</th>
                        </thead>
                        <?php for($i=1; $i<=24; $i++){ ?>
                        <tbody>
                            <td><?=$i == 24 ? '00' : $i?></td>
                        </tbody>
                        <?php } ?>
                    </table>
                </td>
                <?php foreach ($labaHarian as $group) { ?>
                <td>
                    <table class="table table-bordered">
                        <thead>
                            <th>Trx</th>
                            <th>Laba</th>
                        </thead>
                        <?php foreach ($group as $item) { ?>
                        <tbody>
                            <td><?=$item['trx']?></td>
                            <td><?=$item['laba']?></td>
                        </tbody>
                        <?php } ?>
                    </table>
                </td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
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