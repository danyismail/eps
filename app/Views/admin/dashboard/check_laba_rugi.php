<?php $this->extend('layout/template') ?>
<?php $this->Section('content') ?>
<div class="bg-white mb-3 mt-3 table-responsive">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="<?=base_url('/reseller/labarugi')?>" class="mb-2 mt-2">
                <div class="row mb-2 mt-2">
                    <div class="form-group col-md-3">
                        <label for="db">Pilih Database</label>
                        <select name="db" class="form-control">
                            <option value="">-- Choose --</option>
                            <?php $session = session(); ?>
                            <?php if(in_array($session->get('data')['role'], ['amazone', 'superadmin'] )) {?>
                                <option value="ra" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>Replica Amazone</option>
                            <?php } ?>

                            <?php if(in_array($session->get('data')['role'], ['eps', 'superadmin'] )) {?>
                                <option value="re" <?=@$_GET['db'] === "re" ? "selected" : ''?>>Replica EPS</option>
                            <?php } ?>

                            <?php if(in_array($session->get('data')['role'], ['amazone', 'eps', 'superadmin'] )) {?>
                                <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="StartDate">Start Date</label>
                        <input type="date" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="endDt">End Date</label>
                        <input type="date" name="endDt" class="form-control" value="<?=@$_GET['endDt']?>" />
                    </div>
                    <div class="form-group col-md-3 pt-2">
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered " id="datatablesSimple">
            <thead>
                <tr class="bg-info text-white">
                    <th width="1">No</th>
                    <th width="10">Nama</th>
                    <th width="400" class="text-nowrap">Trx</th>
                    <th width="400" class="text-nowrap">Laba</th>
                    <th width="200">Rugi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    foreach($labarugi as $row):
                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=FormatNumber($row['trx'])?></td>
                    <td><?=FormatNumber($row['laba'])?></td>
                    <td><?=FormatNumber($row['rugi'])?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>