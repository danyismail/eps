@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <form method="GET" action="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <span for="db" class="">Pilih Database</span>
                        <select name="db" class="form-control">
                            <option value="">-- Choose --</option>
                            <option value="da" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos Amazone</option>
                            <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos EPS</option>
                            <option value="od" <?=@$_GET['db'] === "od" ? "selected" : ''?>>Otodev</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <span for="tujuan">Tujuan</span>
                        <input type="text" name="tujuan" class="form-control" value="<?=@$_GET['tujuan']?>" />
                    </div>
                    <div class="form-group col-md-3">
                        <span for="shift">Shift</span>
                        <select name="shift" class="form-control">
                            <option value="">-- Choose --</option>
                            <option value="pagi" <?=@$_GET['shift'] === "pagi" ? "selected" : ''?>>Pagi</option>
                            <option value="sore" <?=@$_GET['shift'] === "sore" ? "selected" : ''?>>Sore</option>
                            <option value="malam" <?=@$_GET['shift'] === "malam" ? "selected" : ''?>>Malam</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <span for="status">Status</span>
                        <select name="status" class="form-control">
                            <option value="">-- Choose --</option>
                            <option value="40" <?=@$_GET['status'] === "40" ? "selected" : ''?>>Gagal</option>
                            <option value="52" <?=@$_GET['status'] === "52" ? "selected" : ''?>>Tujuan Salah</option>
                            <option value="20" <?=@$_GET['status'] === "20" ? "selected" : ''?>>Sukses</option>
                        </select>
                    </div>
                    <!-- <div class="col-md-3"></div> -->
                    <div class="form-group col-md-3">
                        <span for="StartDate">Start Date</span>
                        <input type="date" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>" />
                    </div>
                    <div class="form-group col-md-3">
                        <span for="endDt">End Date</span>
                        <input type="date" name="endDt" class="form-control" value="<?=@$_GET['endDt']?>" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-nowrap">Entry Date</th>
                        <th class="text-nowrap">Status Date</th>
                        <th>Status</th>
                        <th class="text-nowrap">Kode Produk</th>
                        <th>Tujuan</th>
                        <th>KPI</th>
                        <th>Shift</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td><?=date("d-m-Y h:m:s", strtotime($row->tanggal_entri))?></td>
                            <td><?=date("d-m-Y h:m:s", strtotime($row->tanggal_status))?></td>
                            <td>
                                <?php if($row->status == "40") {
                                echo "<span class='text-danger'>GAGAL</span>";
                            } elseif ($row->status == "52"){
                                echo "<span class='text-warning'>TUJUAN SALAH</span>";
                            } else {
                                echo "<span class='text-success'>SUKSES</span>";
                            }
                        ?>
                            </td>
                            <td><?=$row->kode_produk?></td>
                            <td><?=$row->tujuan?></td>
                            <td <?php if($row->kpi > 180): ?> style="color:red;" <?php endif; ?>>
                                <?php echo $row->waktu_respon?>
                            </td>
                            <td><?=$row->shift?></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                <?php
                    if (ceil($total_pages / $num_results_on_page) > 0):
                ?>
                <ul class="pagination justify-content-center mb-0 mt-1">
                    <?php if ($page > 1): ?>
                    <li class="prev"><a href="?page=<?=$page-1 ?>&<?=$queryString?>">Prev</a></li>
                    <?php endif; ?>

                    <?php if ($page > 3): ?>
                    <li class="start"><a href="?page=1&<?=$queryString?>">1</a></li>
                    <li class="dots">...</li>
                    <?php endif; ?>

                    <?php if ($page-2 > 0): ?><li class="page"><a
                            href="?page=<?=$page-2?>&<?=$queryString?>"><?=$page-2 ?></a></li><?php endif; ?>
                    <?php if ($page-1 > 0): ?><li class="page"><a
                            href="?page=<?=$page-1?>&<?=$queryString?>"><?=$page-1 ?></a></li><?php endif; ?>

                    <li class="currentpage"><a href="?page=<?=$page?>&<?=$queryString?>"><?=$page ?></a></li>

                    <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                            href="?page=<?=$page+1 ?>&<?=$queryString?>"><?=$page+1 ?></a></li><?php endif; ?>
                    <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                            href="?page=<?=$page+2 ?>&<?=$queryString?>"><?=$page+2 ?></a></li><?php endif; ?>

                    <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
                    <li class="dots">...</li>
                    <li class="end"><a
                            href="?page=<?=ceil($total_pages / $num_results_on_page) ?>&<?=$queryString?>"><?=ceil($total_pages / $num_results_on_page) ?></a>
                    </li>
                    <?php endif; ?>

                    <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                    <li class="next"><a href="?page=<?=$page+1 ?>&<?=$queryString?>">Next</a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
@endsection