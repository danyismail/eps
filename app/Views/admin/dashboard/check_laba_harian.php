<?php $this->extend('admin/layout/template_new') ?>
<?php $this->Section('content') ?>
<div class="bg-white mb-3 mt-3">
    <table class="table table-bordered table-responsive">
        <thead>
            <?php foreach ($labaHarian as $group) { ?>
                <th class="text-center"><?=$group[0]['tanggal']?></th>
            <?php } ?>
        </thead>
        <tbody>
            <?php foreach ($labaHarian as $group) { ?>
                <td>
                    <table>
                        <thead>
                            <th>Jam</th>
                            <th>Trx</th>
                            <th>Laba</th>
                        </thead>
                        <?php foreach ($group as $item) { ?>
                            <tbody>
                                <td><?=$item['jam']?></td>
                                <td><?=$item['trx']?></td>
                                <td><?=$item['laba']?></td>
                            </tbody>
                        <?php } ?>
                    </table>
                </td>
            <?php } ?>
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