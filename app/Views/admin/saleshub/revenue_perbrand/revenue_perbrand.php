<?php $this->extend('layout/template_saleshub') ?>
<?php $this->Section('content') ?>
<div class="mt-2">
    <div class="table-responsive bg-white pb-3 p-2">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="<?=base_url('/saleshub/revenue_perbrand')?>" class="mb-5">
                    <div class="row mb-4">
                        <input type="text" name="db" value="<?=@$_GET['db']?>" hidden id="form_db" />
                        <div class="form-group col-md-3 mt-2">
                            <label for="StartDate">Start Date</label>
                            <input type="date" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>"
                                id="startDate" />
                        </div>
                        <div class="form-group col-md-3 mt-2">
                            <label for="endDt">End Date</label>
                            <input type="date" name="endDt" class="form-control"
                                value="<?=@$_GET['startDt'] === 'yesterday' ? '' : @$_GET['endDt']?>" id="endDate" />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-md-3">
                            <input type="checkbox" name="startDt" value="yesterday"
                                <?=@$_GET['startDt'] === 'yesterday' ? 'checked' : ''?> id="checkBoxYesterday">
                            <label for="html">Yesterday</label><br>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" id="submitForm">Submit</button>
                </form>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr class="bg-successtext-white">
                    <th rowspan="3" style="vertical-align: middle;text-align: center;">Provider</th>
                    <th colspan="17" class="text-center">JENIS</td>
                </tr>
                <tr class="bg-successtext-white">
                    <th colspan="2">DATA</th>
                    <th colspan="2">REGULER</th>
                    <th colspan="2">SMS</th>
                    <th colspan="2">TELP</th>
                    <th colspan="2">TRANSFER</th>
                    <th colspan="2">VOUCHER</th>
                    <th colspan="2">OTHER</th>
                    <th colspan="2">SUB TOTAL</th>
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
                </tr>

                <?php foreach($data['response'] as $i => $item): ?>
                <?php if($data['response'][$i]){ ?>
                <tr>
                    <td><?=$i?></td>
                    <?php foreach($item['category'] as $category): $dataNotfoundData = true ?>
                    <?php
                                    if($category['jenis_produk'] === 'DATA'){
                                        $dataNotfoundData = false; 
                                ?>
                    <td><?=FormatNumber($category['trx']);?></td>
                    <td><?=FormatNumber($category['laba']);?></td>
                    <?php break;  } ?>
                    <?php endforeach; 
                                echo ($dataNotfoundData) ? '<td></td><td></td>' : ''; 
                            ?>

                    <?php foreach($item['category'] as $category): $dataNotfoundReg = true ?>
                    <?php
                                    if($category['jenis_produk'] === 'REGULER'){ 
                                        $dataNotfoundReg = false; 
                                ?>
                    <td><?=FormatNumber($category['trx']);?></td>
                    <td><?=FormatNumber($category['laba']);?></td>
                    <?php break;  } ?>
                    <?php endforeach; 
                                echo ($dataNotfoundReg) ? '<td></td><td></td>' : ''; 
                            ?>

                    <?php foreach($item['category'] as $category): $dataNotfoundSMS = true ?>
                    <?php 
                                    if($category['jenis_produk'] === 'SMS'){ 
                                        $dataNotfoundSMS = false;  
                                ?>
                    <td><?=$category['trx'];?></td>
                    <td><?=$category['laba'];?></td>
                    <?php break; } ?>
                    <?php endforeach; 
                                echo ($dataNotfoundSMS) ? '<td></td><td></td>' : ''; 
                            ?>

                    <?php foreach($item['category'] as $category): $dataNotfoundTelp = true ?>
                    <?php
                                    if($category['jenis_produk'] === 'TELP'){ 
                                        $dataNotfoundTelp = false; 
                                ?>
                    <td><?=FormatNumber($category['trx']);?></td>
                    <td><?=FormatNumber($category['laba']);?></td>
                    <?php break; } ?>
                    <?php endforeach; 
                                echo ($dataNotfoundTelp) ? '<td></td><td></td>' : ''; 
                            ?>

                    <?php foreach($item['category'] as $category): $dataNotfoundTF = true ?>
                    <?php
                                    if($category['jenis_produk'] === 'TRANSFER'){ 
                                        $dataNotfoundTF = false; 
                                ?>
                    <td><?=FormatNumber($category['trx']);?></td>
                    <td><?=FormatNumber($category['laba']);?></td>
                    <?php break; } ?>
                    <?php endforeach; 
                                echo ($dataNotfoundTF) ? '<td></td><td></td>' : ''; 
                            ?>

                    <?php foreach($item['category'] as $category): $dataNotfoundVoucher = true ?>
                    <?php 
                                    if($category['jenis_produk'] === 'VOUCHER'){ 
                                        $dataNotfoundVoucher = false;
                                ?>
                    <td><?=$category['trx'];?></td>
                    <td><?=$category['laba'];?></td>
                    <?php break; } ?>
                    <?php endforeach; 
                                echo ($dataNotfoundVoucher) ? '<td></td><td></td>' : ''; 
                            ?>

                    <?php foreach($item['category'] as $category): $dataNotfoundOther = true ?>
                    <?php 
                                    if($category['jenis_produk'] === 'OTHER'){ 
                                        $dataNotfoundOther = false;
                                ?>
                    <td><?=FormatNumber($category['trx']);?></td>
                    <td><?=FormatNumber($category['laba']);?></td>
                    <?php break; } ?>
                    <?php endforeach; 
                                echo ($dataNotfoundOther) ? '<td></td><td></td>' : ''; 
                            ?>

                    <?php if($data['response'][$i]) { ?>
                    <td><?=FormatNumber($data['response'][$i]['total_trx']);?></td>
                    <td><?=FormatNumber($data['response'][$i]['total_laba']);?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="15" align="right">TOTAL</td>
                    <td><?=@FormatNumber($data['sub_total'])?></td>
                    <td><?=@FormatNumber($data['total'])?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
$('#checkBoxYesterday').change(function() {
    $('#startDate').val('');
    $('#endDate').val('');
});

$('#startDate').change(function() {
    $('#checkBoxYesterday').prop('checked', false);
});

$('#endDate').change(function() {
    $('#checkBoxYesterday').prop('checked', false);
});

$('#submitForm').click(function(e) {
    e.preventDefault();

    var db = $('#form_db').val();
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();
    var yesterday = $('#checkBoxYesterday').val();

    if ($('#checkBoxYesterday').is(":checked")) {
        params = '?db=' + db + '&startDt=' + yesterday;
    } else if (startDate.length > 0 && endDate.length > 0) {
        params = "?db=" + db + "&startDt=" + startDate + "&endDt=" + endDate;
    } else {
        params = '?db=' + db;
    }

    location.href = "<?=base_url('/saleshub/revenue_perbrand')?>" + params;
});
</script>
<?php $this->endSection() ?>