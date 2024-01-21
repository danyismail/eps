<?php $this->extend('admin/layout/template') ?>
<!-- declare section with name content-->
<?php $this->Section('content') ?>
<div id="layoutSidenav_content">
    <form method="POST">
        <div class="col-md-3">
        <input type="date" name="startDt" class="form-control"/>
        <input type="date" name="endDt" class="form-control"/></br>
        <button type="submit" name="filterTanggal">Query</button>
        </div>
    </form>
<table class="table table-bordered">
  <thead>
    <tr>
      <th rowspan="3">Provider</th>
      <th colspan="9">Category</td>
    </tr>
    <tr>
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
      <td></td>
      <td>TRX</td>
      <td>LABA</td>
      <td>TRX</td>
      <td>LABA</td>
      <td>TRX</td>
      <td>LABA</td>
      <td>TRX</td>
      <td>LABA</td>
      <td>TRX</td>
      <td>LABA</td>
      <td>TRX</td>
      <td>LABA</td>
      <td>TRX</td>
      <td>LABA</td>
      <td>TRX</td>
      <td>LABA</td>
      <td>TRX</td>
      <td>LABA</td>
    </tr>
    <?php foreach($data as $p): ?>
    <tr>
    <td><?= $p['name'] ?></td>
    <td><?= $p['trx_data'] ?></td>
    <td><?= $p['margin_data'] ?></td>
    <td><?= $p['trx_reguler'] ?></td>
    <td><?= $p['margin_reguler'] ?></td>
    <td><?= $p['trx_sms'] ?></td>
    <td><?= $p['margin_sms'] ?></td>
    <td><?= $p['trx_voucher'] ?></td>
    <td><?= $p['margin_voucher'] ?></td>
    <td><?= $p['trx_transfer'] ?></td>
    <td><?= $p['margin_transfer'] ?></td>
    <td><?= $p['trx_telepon'] ?></td>
    <td><?= $p['margin_telepon'] ?></td>
    <td><?= $p['trx_ec'] ?></td>
    <td><?= $p['margin_ec'] ?></td>
    <td><?= $p['trx_pln'] ?></td>
    <td><?= $p['margin_pln'] ?></td>
    <td><?= $p['trx_game'] ?></td>
    <td><?= $p['margin_game'] ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php $this->endSection() ?>


                

