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
            <table class="table table-bordered " id="datatable-1">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="39%">Nama</th>
                        <th width="20%" class="text-nowrap">Trx</th>
                        <th width="20%" class="text-nowrap">Laba</th>
                        <th width="20%">Rugi</th>
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
                        <td><?=number_format($row['trx'], 0, '.', '.')?></td>
                        <td><?=number_format($row['laba'], 0, '.', '.')?></td>
                        <td><?=number_format($row['rugi'], 0, '.', '.')?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection