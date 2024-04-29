<?php $this->extend('admin/layout/template_new') ?>
<?php $this->Section('content') ?>
<div class="table-responsive bg-white pb-3">
    <?php
        foreach ($labaHarian as $group) {
            echo "<h3>" . $group[0]['tanggal'] . "</h3>";
            echo "<table class=table table-bordered>";
            echo "<th>Jam</th><th>Trx</th><th>Laba</th></tr>";
            foreach ($group as $item) {
                echo "<tr>";
                if($item['jam'] === 0){
                    $item['jam'] = '00';
                }
                echo "<td>" . $item['jam']  . "</td>";
                echo "<td>" . $item['trx'] . "</td>";
                echo "<td>" . $item['laba'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
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