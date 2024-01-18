<div class="container">
<table border="solid 1px">
<thead>
<tr>
    <th>Provider</th>
    <th>Product Type</th>
    <th>Trx</th>
    <th>Margin</th>
</tr>
</thead>
<tbody>
<?php foreach($reports as $news): ?>
<tr>
    <td><?= $news['provider'] ?></td>
    <td><?= $news['product_type'] ?></td>
    <td><?= $news['trx'] ?></td>
    <td><?= $news['margin'] ?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>