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
                            <option value="<?=url('laba-reseller/ra')?>" <?=(Request::path() === 'laba-reseller/ra') ? 'selected' : ''?>>Replica Amazone</option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                            <option value="<?=url('laba-reseller/re')?>"<?=(Request::path() === 'laba-reseller/re') ? 'selected' : ''?>>Replica EPS</option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) {?>
                            <option value="<?=url('laba-reseller/da')?>"<?=(Request::path() === 'laba-reseller/da') ? 'selected' : ''?>>Digipos Amazone</option>
                        <?php } ?>

                        <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                            <option value="<?=url('laba-reseller/de')?>" <?=(Request::path() === 'laba-reseller/de') ? 'selected' : ''?>>Digipos EPS</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <form method="GET" action="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="StartDate">Start Date</label>
                        <input type="date" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="endDt">End Date</label>
                        <input type="date" name="endDt" class="form-control" value="<?=@$_GET['endDt']?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id">Kode Reseller</label> <span class="text-danger">*wajib input kode
                            reseller</span>
                        <select id="singleSelect" class="js-states form-control" name="id">
                            @foreach($reseller as $row)
                                <option value="{{$row->kode}}" <?=@$_GET['id'] === $row->kode ? 'selected' : ''?>>
                                    {{$row->kode}} - {{$row->nama}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>Reseller</td>
                        <td><?=@$data2->nama?></td>
                    </tr>
                    <tr>
                        <td>Total Transaksi</td>
                        <td><?=number_format(@$data2->trx,0, '.', '.')?></td>
                    </tr>
                    <tr>
                        <td>Total Penjualan</td>
                        <td><?=number_format(@$data2->jual,0, '.', '.')?></td>
                    </tr>
                    <tr>
                        <td>Total Pembelian</td>
                        <td><?=number_format(@$data2->beli,0, '.', '.')?></td>
                    </tr>
                    <tr>
                        <td>Total Laba</td>
                        <td><?=number_format(@$data2->laba,0, '.', '.')?></td>
                    </tr>
                    <?php if(count($data) === 0) { ?>
                    <tr>
                        <td colspan="3" class="text-center">Tidak Ada Data</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="datatable-1">
                    <thead>
                        <tr>
                            <th width="40%">Kode Produk</th>
                            <th>Trx</th>
                            <th>Laba</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{$row->kode_produk}}</td>
                            <td>{{number_format($row->trx,0, '.', '.')}}</td>
                            <td>{{number_format($row->laba,0, '.', '.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection