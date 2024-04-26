<?php $this->extend('admin/layout/template_new') ?>
<?php $this->Section('content') ?>
<div class="pr-5 pl-5 mt-5">
    <div class="row">
        <div class="col-md-6">
            <form method="GET" action="<?=base_url('')?>" class="mb-5">
                <!-- <div class="form-row"> -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="StartDate">Start Date <?=isset($startDt) ?? ''?></label>
                        <input type="date" name="startDt" class="form-control" value="<?=isset($startDt) ?? ''?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="endDt">End Date</label>
                        <input type="date" name="endDt" class="form-control" value="<?=isset($endDate) ?? ''?>" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                <!-- </div> -->
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-success text-white">
                    <th rowspan="3" style="vertical-align: middle;text-align: center;">Provider</th>
                    <th colspan="100" style="border:none" class="text-center">JENIS</td>
                </tr>
                <tr class="bg-success text-white">
                    <th colspan="2">DATA</th>
                    <th colspan="2">REGULER</th>
                    <th colspan="2">SMS</th>
                    <th colspan="2">TELP</th>
                    <th colspan="2">TRANSFER</th>
                    <th colspan="2">VOUCHER</th>
                    <th colspan="2">ECOMMERCE</th>
                    <th colspan="2">PLN</th>
                    <th colspan="2">GAME</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-gray"></td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                    <td>TRX</td>
                    <td class="bg-gray">LABA</td>
                </tr>
                <?php foreach($data as $p): ?>
                <tr class="text-center">
                    <td class="bg-gray"><?= $p['name'] ?></td> <!-- PROVIDER -->
                    <td><?= $p['trx_data'] ?></td> <!-- DATA -->
                    <td class="bg-gray"><?= $p['margin_data'] ?></td> <!-- DATA LABA -->
                    <td><?= $p['trx_reguler'] ?></td> <!-- REGULER -->
                    <td class="bg-gray"><?= $p['margin_reguler'] ?></td> <!-- REGULER LABA -->
                    <td><?= $p['trx_sms'] ?></td> <!-- SMS -->
                    <td class="bg-gray"><?= $p['margin_sms'] ?></td> <!-- SMS LABA -->
                    <td><?= $p['trx_telepon'] ?></td> <!-- TELP -->
                    <td class="bg-gray"><?= $p['margin_telepon'] ?></td> <!-- TELP LABA-->
                    <td><?= $p['trx_transfer'] ?></td> <!-- TRANSFER -->
                    <td class="bg-gray"><?= $p['margin_transfer'] ?></td> <!-- TRANSFER LABA -->
                    <td><?= $p['trx_voucher'] ?></td> <!-- VOUCHER -->
                    <td class="bg-gray"><?= $p['margin_voucher'] ?></td> <!-- VOUCHER LABA -->
                    <td><?= $p['trx_ec'] ?></td> <!-- ECOMMERCE -->
                    <td class="bg-gray"><?= $p['margin_ec'] ?></td> <!-- ECOMMERCE LABA -->
                    <td><?= $p['trx_pln'] ?></td> <!-- PLN -->
                    <td class="bg-gray"><?= $p['margin_pln'] ?></td> <!-- PLN LABA -->
                    <td><?= $p['trx_game'] ?></td> <!-- GAME -->
                    <td class="bg-gray"><?= $p['margin_game'] ?></td> <!-- GAME LABA -->
                </tr>
                <?php endforeach ?>
                <tr class="text-center">
                    <td rowspan="2" class="bg-gray" style="vertical-align: middle;text-align: center;">TOTAL</td>
                    <td colspan="100"></td>
                    <!-- <td>TRX</td>
              <td class="bg-gray">LABA</td> -->
                </tr>
                <tr class="text-center">
                    <?php foreach($total as $item_total): ?>
                    <?php foreach($item_total as $item  => $val): ?>
                    <?php
                    if($item === 'TOTAL_TRX_DATA') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_DATA') {
                      echo '<td>'.$val.'</td>';
                    }

                    if($item === 'TOTAL_TRX_REGULER') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_REGULER') {
                      echo '<td>'.$val.'</td>';
                    }

                    if($item === 'TOTAL_TRX_SMS') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_SMS') {
                      echo '<td>'.$val.'</td>';
                    }

                    if($item === 'TOTAL_TRX_TELP') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_TELP') {
                      echo '<td>'.$val.'</td>';
                    }

                    if($item === 'TOTAL_TRX_TRANSFER') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_TRANSFER') {
                      echo '<td>'.$val.'</td>';
                    }

                    if($item === 'TOTAL_TRX_VOUCHER') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_VOUCHER') {
                      echo '<td>'.$val.'</td>';
                    }

                    if($item === 'TOTAL_TRX_ECOMMERCE') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_ECOMMERCE') {
                      echo '<td>'.$val.'</td>';
                    }

                    if($item === 'TOTAL_TRX_PLN') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_PLN') {
                      echo '<td>'.$val.'</td>';
                    }

                    if($item === 'TOTAL_TRX_GAME') {
                      echo '<td>'.$val.'</td>';
                    }
                    if($item === 'TOTAL_MARGIN_GAME') {
                      echo '<td>'.$val.'</td>';
                    }
                  ?>

                    <?php endforeach ?>
                    <?php endforeach ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>