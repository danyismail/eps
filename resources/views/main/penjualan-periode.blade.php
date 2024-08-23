@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <form method="GET" action="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="db">Pilih Database</label>
                        <select name="db" class="form-control">
                            <option value="">-- Choose --</option>
                            <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) {?>
                                <option value="ra" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>Replica Amazone</option>
                            <?php } ?>

                            <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                                <option value="re" <?=@$_GET['db'] === "re" ? "selected" : ''?>>Replica EPS</option>
                            <?php } ?>

                            <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) {?>
                                <option value="da" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos Amazone</option>
                            <?php } ?>

                            <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                                <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos EPS</option>
                            <?php } ?>

                            <?php if(in_array(session('userdata')['role'], ['superadmin'] )) {?>
                                <option value="od" <?=@$_GET['db'] === "od" ? "selected" : ''?>>Otodev</option>
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
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $isToday = time();
                $isDate = date("Y-m-d", strtotime('+7 hours', $isToday));
                $isTime = date("H:i:s", strtotime('+7 hours', $isToday));
                ?>
                Total penjualan hari ini <?php echo $isDate ?> jam 00:00:00 sampai dengan <?php echo $isTime ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Trx</th>
                            <th>Pembelian</th>
                            <th>Penjualan</th>
                            <th>Laba</th>
                            <th>PPH 22</th>
                            <th>Laba Net</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{number_format($row->trx, 0, '.', '.')}}</td>
                                <td>{{number_format($row->pembelian, 0, '.', '.')}}</td>
                                <td>{{number_format($row->penjualan, 0, '.', '.')}}</td>
                                <td>{{number_format($row->laba, 0, '.', '.')}}</td>
                                <td>{{number_format($row->pph, 2, ',', '.')}}</td>
                                <td>{{number_format($row->laba_net, 2, ',', '.')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection