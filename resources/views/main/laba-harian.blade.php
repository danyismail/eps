@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="form-group col-md-3">
                    <label for="db">Pilih Database</label>
                    <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)">
                        <option value="">Select...</option>
                        <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) {?>
                            <option value="<?=url('laba-harian?db=ra')?>" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>Replica Amazone</option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                            <option value="<?=url('laba-harian?db=re')?>" <?=@$_GET['db'] === "re" ? "selected" : ''?>>Replica EPS</option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) {?>
                            <option value="<?=url('laba-harian?db=da')?>" <?=@$_GET['db'] === "da" ? "selected" : ''?> >Digipos Amazone</option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                            <option value="<?=url('laba-harian?db=de')?>" <?=@$_GET['db'] === "de" ? "selected" : ''?> >Digipos EPS</option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                            <option value="<?=url('laba-harian?db=od')?>" <?=@$_GET['db'] === "do" ? "selected" : ''?> >Otodev</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr style="border-top: 1px solid #ddd">
                        <th width="1%" style="border-bottom:none; border-left:1px solid #ddd"></th>
                        <th scope="col" class="text-center" style="border-bottom:none; border-right:1px solid #ddd"><?=date("Y-m-d", strtotime("-2 day"))?></th>
                        <th scope="col" class="text-center" style="border-bottom:none; border-right:1px solid #ddd"><?=date("Y-m-d", strtotime("-1 day"))?></th>
                        <th scope="col" class="text-center" style="border-bottom:none; border-right:1px solid #ddd"><?=date("Y-m-d")?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #ddd">
                        <td style="padding: 0; border-left:1px solid #ddd; border-top: none">
                            <table class="tablex m-0">
                                <thead>
                                    <th style="border-bottom: none;">Jam</th>
                                </thead>
                                <?php for($i=1; $i<=24; $i++){ ?>
                                <tbody style="border: none">
                                    <td  style="border-bottom: none;"><?=$i == 24 ? '00' : $i?></td>
                                </tbody>
                                <?php } ?>
                            </table>
                        </td>
                        
                        <td style="padding: 0; border-top: none">
                            <?php
                                foreach ($labaHarian as $group) { 
                                    if(date("Y-m-d", strtotime("-2 day")) == $group[0]['tanggal']) { 
                            ?>
                                <table class="table m-0">
                                    <thead>
                                        <th style="border-bottom: none; border-left: 1px solid #ddd;">Trx</th>
                                        <th style="border-right: 1px solid #ddd; border-bottom: none">Laba</th>
                                    </thead>
                                    
                                    <?php 
                                        foreach ($group as $item) { 
                                    ?>
                                        <tbody style="border: none">
                                            <td style="border-left: 1px solid #ddd; border-bottom: none"><?=number_format($item['trx'],0, '.', '.')?></td>
                                            <td style="border-right: 1px solid #ddd; border-bottom: none"><?=number_format($item['laba'],0, '.', '.')?></td>
                                        </tbody>
                                    <?php } ?>

                                    <?php 
                                        if(count($group) < 24) { 
                                            for($i=1; $i <= 24 - count($group); $i++) {
                                    ?>
                                    <tbody>
                                        <td style="border-left: 1px solid #ddd; border-bottom: none">&nbsp;</td>
                                        <td style="border-right: 1px solid #ddd; border-bottom: none">&nbsp;</td>
                                    </tbody>
                                    <?php } } ?>
                                    
                                </table>
                            <?php } } ?>
                        </td>

                        <td style="padding: 0; border-top: none">
                            <?php
                                foreach ($labaHarian as $group) { 
                                    if(date("Y-m-d", strtotime("-1 day")) == $group[0]['tanggal']) { 
                            ?>
                                    <table class="table m-0">
                                        <thead>
                                            <th style="border-bottom: none">Trx</th>
                                            <th style="border-right: 1px solid #ddd; border-bottom: none">Laba</th>
                                        </thead>
                                        <?php 
                                            foreach ($group as $item) { 
                                        ?>
                                            <tbody style="border: none">
                                                <td style="border-bottom: none"><?=number_format($item['trx'],0, '.', '.')?></td>
                                                <td style="border-right: 1px solid #ddd; border-bottom: none"><?=number_format($item['laba'],0, '.', '.')?></td>
                                            </tbody>
                                        <?php } ?>

                                        <?php 
                                            if(count($group) < 24) { 
                                                for($i=1; $i <= 24 - count($group); $i++) {
                                        ?>
                                        <tbody>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tbody>
                                        <?php } } ?>
                                    </table>
                            <?php } } ?>
                        </td>

                        <td style="padding: 0; border-top: none">
                            <?php
                                foreach ($labaHarian as $group) { 
                                    if(date("Y-m-d") == $group[0]['tanggal']) { 
                            ?>
                                <table class="table m-0" style="border: 0">
                                    <thead>
                                        <th style="border-bottom: none">Trx</th>
                                        <th style="border-right: 1px solid #ddd; border-bottom: none">Laba</th>
                                    </thead>
                                    <?php 
                                        foreach ($group as $item) { 
                                    ?>
                                        <tbody style="border:none">
                                            <td style="border-bottom: none"><?=number_format($item['trx'],0, '.', '.')?></td>
                                            <td style="border-right: 1px solid #ddd; border-bottom: none"><?=number_format($item['laba'],0, '.', '.')?></td>
                                        </tbody>
                                    <?php } ?>

                                    <?php 
                                        if(count($group) < 24) { 
                                            for($i=1; $i <= 24 - count($group); $i++) {
                                    ?>
                                    <tbody style="border:none">
                                        <td style="border-bottom: none">&nbsp;</td>
                                        <td style="border-right: 1px solid #ddd; border-bottom: none">&nbsp;</td>
                                    </tbody>
                                    <?php } } ?>
                                </table>
                            <?php } } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection