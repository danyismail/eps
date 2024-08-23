@extends('layout.template')
@section('content')
    <div class="card">
        <div class="card-header">
            <?php
                $isToday = time();
                $isDate = date("Y-m-d", strtotime('+7 hours', $isToday));
                $isTime = date("H:i:s", strtotime('+7 hours', $isToday));
            ?>
            <p>Total pemakaian deposit hari ini <?php echo $isDate ?> jam 00:00:00 sampai dengan <?php echo $isTime ?></p>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="db">Pilih Database</label>
                    <select class="form-control"
                        onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option value="">Select...</option>
                        
                        <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) { ?>
                        <option value="<?=url('saldo?db=ra')?>" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>
                            Replica Amazone
                        </option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                        <option value="<?=url('saldo?db=re')?>" <?=@$_GET['db'] === "re" ? "selected" : ''?>>
                            Replica EPS
                        </option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) {?>
                        <option value="<?=url('saldo?db=da')?>" <?=@$_GET['db'] === "da" ? "selected" : ''?>>
                            Digipos Amazone
                        </option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                        <option value="<?=url('saldo?db=da')?>" <?=@$_GET['db'] === "de" ? "selected" : ''?>>
                            Digipos EPS
                        </option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                        <option value="<?=url('saldo?db=da')?>" <?=@$_GET['db'] === "de" ? "selected" : ''?>>
                            Digipos EPS
                        </option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['superadmin'] )) {?>
                        <option value="<?=url('saldo?db=od')?>" <?=@$_GET['db'] === "od" ? "selected" : ''?>>
                            Otodev
                        </option>
                        <?php } ?>

                    </select>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Total Transaksi</th>
                        <th>Pemakaian Saldo</th>
                        <th>Saldo Sekarang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td><?=$row->label?></td>
                            <td><?=$row->total_transaksi?></td>
                            <td><?=number_format($row->pemakaian_saldo,0, '.', '.')?></td>
                            <td><?=number_format($row->saldo_sekarang,0, '.', '.')?></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection