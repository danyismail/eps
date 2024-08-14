<?php $this->extend('layout/template') ?>
<?php $this->Section('content') ?>
<div class="bg-white mb-3 mt-3 table-responsive">
    <div class="row mb-3">
        <div class="form-group col-md-3">
            <label for="db">Pilih Database</label>
            <select class="form-control"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Select...</option>
                <?php $session = session(); ?>
                <?php if(in_array($session->get('data')['role'], ['amazone', 'superadmin'] )) {?>
                <option value="<?=base_url('reseller/ra/harian')?>"
                    <?=(uri_string() === 'reseller/ra/harian') ? 'selected' : ''?>>Replica Amazone</option>
                <?php } ?>

                <?php if(in_array($session->get('data')['role'], ['eps', 'superadmin'] )) {?>
                <option value="<?=base_url('reseller/re/harian')?>"
                    <?=(uri_string() === 'reseller/re/harian') ? 'selected' : ''?>>Replica EPS</option>
                <?php } ?>

                <?php if(in_array($session->get('data')['role'], ['amazone', 'superadmin'] )) {?>
                <option value="<?=base_url('reseller/da/harian')?>"
                    <?=(uri_string() === 'reseller/da/harian') ? 'selected' : ''?>>Digipos Amazone</option>
                <?php } ?>

                <?php if(in_array($session->get('data')['role'], ['eps', 'superadmin'] )) {?>
                <option value="<?=base_url('reseller/de/harian')?>"
                    <?=(uri_string() === 'reseller/de/harian') ? 'selected' : ''?>>Digipos EPS</option>
                <?php } ?>

                <?php if(in_array($session->get('data')['role'], ['eps', 'superadmin'] )) {?>
                <option value="<?=base_url('reseller/od/harian')?>"
                    <?=(uri_string() === 'reseller/od/harian') ? 'selected' : ''?>>Otodev</option>
                <?php } ?>
            </select>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th width="1%" style="border-bottom:none; border-left:1px solid #ddd"></th>
                <th scope="col" class="text-center" style="border-bottom:none; border-right:1px solid #ddd"><?=date("Y-m-d", strtotime("-2 day"))?></th>
                <th scope="col" class="text-center" style="border-bottom:none; border-right:1px solid #ddd"><?=date("Y-m-d", strtotime("-1 day"))?></th>
                <th scope="col" class="text-center" style="border-bottom:none; border-right:1px solid #ddd"><?=date("Y-m-d")?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 0; border-left:1px solid #ddd; border-top: none">
                    <table class="tablex">
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
                        <table class="table">
                            <thead>
                                <th style="border-bottom: none; border-left: 1px solid #ddd;">Trx</th>
                                <th style="border-right: 1px solid #ddd; border-bottom: none">Laba</th>
                            </thead>
                            <?php 
                                foreach ($group as $item) { 
                            ?>
                                <tbody style="border: none">
                                    <td style="border-left: 1px solid #ddd; border-bottom: none"><?=FormatNumber($item['trx'])?></td>
                                    <td style="border-right: 1px solid #ddd; border-bottom: none"><?=FormatNumber($item['laba'])?></td>
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
                            <table class="table">
                                <thead>
                                    <th style="border-bottom: none">Trx</th>
                                    <th style="border-right: 1px solid #ddd; border-bottom: none">Laba</th>
                                </thead>
                                <?php 
                                    foreach ($group as $item) { 
                                ?>
                                    <tbody style="border: none">
                                        <td style="border-bottom: none"><?=FormatNumber($item['trx'])?></td>
                                        <td style="border-right: 1px solid #ddd; border-bottom: none"><?=FormatNumber($item['laba'])?></td>
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
                        <table class="table" style="border: 0">
                            <thead>
                                <th style="border-bottom: none">Trx</th>
                                <th style="border-right: 1px solid #ddd; border-bottom: none">Laba</th>
                            </thead>
                            <?php 
                                foreach ($group as $item) { 
                            ?>
                                <tbody style="border:none">
                                    <td style="border-bottom: none" ><?=FormatNumber($item['trx'])?></td>
                                    <td style="border-right: 1px solid #ddd; border-bottom: none"><?=FormatNumber($item['laba'])?></td>
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