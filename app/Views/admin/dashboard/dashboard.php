<?php $this->extend('admin/layout/template') ?>
<!-- declare section with name content-->
<?php $this->Section('content') ?>
<div id="layoutSidenav_content">
                <main>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Provider</th>
      <th scope="col">Product Type</th>
      <th scope="col">Transaction</th>
      <th scope="col">Margin</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data as $news): ?>
    <tr>
    <td><?= $news['provider'] ?></td>
    <td><?= $news['product_type'] ?></td>
    <td><?= $news['trx'] ?></td>
    <td><?= $news['margin'] ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php $this->endSection() ?>


                

