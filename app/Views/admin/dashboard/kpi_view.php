<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
  <div class="pr-5 pl-5 mt-2">
    <div class="row">
      <div class="col-md-12">
        <form method="GET" action="<?=base_url('')?>" class="mb-5">
              <div class="row mb-4">
                <div class="form-group col-md-3">
                  <label for="StartDate">Start Date</label>
                  <input type="date" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>" />
                </div>
                <div class="form-group col-md-3">
                  <label for="endDt">End Date</label>
                  <input type="date" name="endDt" class="form-control" value="<?=@$_GET['endDt']?>" />
                </div>
                <div class="form-group col-md-3">
                  <label for="mdn">MDN</label>
                  <input type="text" name="mdn" class="form-control" value="<?=@$_GET['mdn']?>" />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="shift">Shift</label>
                  <select name="shift" class="form-control">
                    <option value="">-- Choose --</option>
                    <option value="pagi" <?=@$_GET['shift'] === "pagi" ? "selected" : ''?>>Pagi</option>
                    <option value="siang" <?=@$_GET['shift'] === "siang" ? "selected" : ''?>>Siang</option>
                    <option value="malam" <?=@$_GET['shift'] === "malam" ? "selected" : ''?>>Malam</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="status">Status</label>
                  <select name="status" class="form-control">
                    <option value="">-- Choose --</option>
                    <option value="40" <?=@$_GET['status'] === "40" ? "selected" : ''?>>Gagal</option>
                    <option value="52" <?=@$_GET['status'] === "52" ? "selected" : ''?>>Tujuan Salah</option>
                    <option value="20" <?=@$_GET['status'] === "20" ? "selected" : ''?>>Sukses</option>
                  </select>
                </div>
              </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
      </div>
    </div>

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
          <tr class="bg-success text-white">
          <th>Entry Date</th>
          <th>Status Date</th>
          <th>Status</th>
          <th>Kode Produk</th>
          <th>Tujuan</th>
          <th>KPI</th>
          <th>Shift</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                <td><?=date("d-m-Y h:m:s", strtotime($row['tanggal_entri']))?></td>
                <td><?=date("d-m-Y h:m:s", strtotime($row['tanggal_status']))?></td>
                <td>
                  <?php if($row['status'] == "40") {
                        echo "<span class='text-danger'>GAGAL</span>";
                    } elseif ($row['status'] == "52"){
                        echo "<span class='text-warning'>TUJUAN SALAH</span>";
                    } else {
                        echo "<span class='text-success'>SUKSES</span>";
                    }
                  ?>
                </td>
                  <td><?=$row['kode_produk']?></td>
                  <td><?=$row['tujuan']?></td>
                  <td <?php if($row['kpi'] > 180): ?> style="color:red;" <?php endif; ?>>
                      <?php echo $row['waktu_respon']?>
                  </td>
                  <td><?=$row['shift']?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $this->endSection() ?>
