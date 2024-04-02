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
                    <th scope="col">Loss</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $p): ?>
                <tr>
                    <td><?= $p['provider'] ?></td>
                    <td><?= $p['product_type'] ?></td>
                    <td><?= $p['trx'] ?></td>
                    <td><?= $p['margin'] ?></td>
                    <td><?= $p['loss'] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php $this->endSection() ?>