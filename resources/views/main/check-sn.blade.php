@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <form method="GET" action="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="db">Pilih Database</label>
                        <select class="form-control"
                            onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="">Select...</option>
                            <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) {?>
                            <option value="<?=url('check-sn?db=ra')?>" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>
                                Replica Amazone
                            </option>
                            <?php } ?>

                            <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                            <option value="<?=url('check-sn?db=re')?>" <?=@$_GET['db'] === "re" ? "selected" : ''?>>
                                Replica EPS
                            </option>
                            <?php } ?>

                            <?php if(in_array(session('userdata')['role'], ['amazone', 'superadmin'] )) {?>
                            <option value="<?=url('check-sn?db=da')?>" <?=@$_GET['db'] === "da" ? "selected" : ''?>>
                                Digipos Amazone
                            </option>
                            <?php } ?>

                            <?php if(in_array(session('userdata')['role'], ['eps', 'superadmin'] )) {?>
                            <option value="<?=url('check-sn?db=da')?>" <?=@$_GET['db'] === "de" ? "selected" : ''?>>
                                Digipos EPS
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="datatable-nosearch">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-nowrap">Kode Reseller</th>
                        <th class="text-nowrap">Kode Produk</th>
                        <th>Tujuan</th>
                        <th class="text-nowrap">Tgl Entri</th>
                        <th class="text-nowrap">Tgl Status</th>
                        <th>Supplier</th>
                        <th>SN</th>
                        <th class="text-nowrap">Selisih Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nullableSN as $key => $row)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$row->kode_reseller}}</td>
                        <td>{{$row->kode_produk}}</td>
                        <td>{{$row->tujuan}}</td>
                        <td>{{$row->tgl_entri}}</td>
                        <td>{{$row->tgl_status}}</td>
                        <td>{{$row->supplier}}</td>
                        <td>{{$row->sn}}</td>
                        <td>{{$row->selisih_waktu}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="datatable-nosearch2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-nowrap">SN Tujuan</th>
                        <th>Tujuan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($duplicateSN as $key => $row)
                    <tr>
                        <td>{{ $key + 1}}</td>
                        <td>{{$row->sn}}</td>
                        <td>{{$row->tujuan}}</td>
                        <td>{{$row->total}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection