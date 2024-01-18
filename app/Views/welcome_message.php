<div class="container">
<table class="table">
<thead>
<tr>
    <th>ID</th>
    <th>created_At</th>
    <th>updated_at</th>
    <th>deleted_at</th>
    <th>transaction_id</th>
    <th>entry_date</th>
    <th>product_code</th>
    <th>buying_price</th>
    <th>selling_price</th>
    <th>reseller_name</th>
    <th>module</th>
    <th>reseller_code</th>
    <th>margin</th>
    <th>loss</th>
    <th>product_type</th>
</tr>
</thead>
<tbody>
<?php foreach($data as $news): ?>
<tr>
    <td><?= $news['id'] ?></td>
    <td><?= $news['created_at'] ?></td>
    <td><?= $news['updated_at'] ?></td>
    <td><?= $news['deleted_at'] ?></td>
    <td><?= $news['transaction_id'] ?></td>
    <td><?= $news['entry_date'] ?></td>
    <td><?= $news['product_code'] ?></td>
    <td><?= $news['buying_price'] ?></td>
    <td><?= $news['selling_price'] ?></td>
    <td><?= $news['reseller_name'] ?></td>
    <td><?= $news['module'] ?></td>
    <td><?= $news['reseller_code'] ?></td>
    <td><?= $news['margin'] ?></td>
    <td><?= $news['loss'] ?></td>
    <td><?= $news['product_type'] ?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>