<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
  <div class="pr-5 pl-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <form method="GET" action="<?=base_url('')?>" class="mb-5">
          <!-- <div class="form-row"> -->
            <div class="row">
              <div class="form-group col-md-3">
                <label for="StartDate">Start Date <?=isset($startDt) ?? ''?></label>
                <input type="date" name="startDt" class="form-control" value="<?=isset($startDt) ?? ''?>" />
              </div>
              <div class="form-group col-md-3">
                <label for="endDt">End Date</label>
                <input type="date" name="endDt" class="form-control" value="<?=isset($endDate) ?? ''?>"/>
              </div>
              <div class="form-group col-md-3">
                <label for="StartDate">MDN <?=isset($startDt) ?? ''?></label>
                <input type="text" name="mdn" class="form-control" value="<?=isset($startDt) ?? ''?>" />
              </div>
              <div class="form-group col-md-3">
                <label for="endDt">Status</label>
                <input type="text" name="status" class="form-control" value="<?=isset($endDate) ?? ''?>"/>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
          <!-- </div> -->
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
            <th>Product</th>
            <th>Tujuan</th>
            <th>Waktu Response</th>
            <th>KPI</th>
          </tr>
        </thead>
        <tbody>
             <?php foreach($list  as $row): ?>
                <tr>
                    <td><?=date("d-m-Y h:m:s", strtotime($row->tanggal_entri))?></td>
                    <td><?=date("d-m-Y h:m:s", strtotime($row->tanggal_status))?></td>
                    <td><?=$row->status?></td>
                    <td><?=$row->kode_produk?></td>
                    <td><?=$row->tujuan?></td>
                    <td><?=$row->waktu_respon?></td>
                    <td><?=$row->kpi?></td>
                </tr>
            <?php endforeach ?> 
        </tbody>
      </table>
    </div>
  </div>
<?php $this->endSection() ?>