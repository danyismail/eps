<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
  <div class="pr-5 pl-5 mt-2">
    <div class="table-responsive bg-white p-3">
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-8">
          <form action="<?=base_url('/supplier/da/update')?>" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Name</label>
                <input type="hidden" name="id" value="<?=$data['ID']?>">
                <input type="text" disabled class="form-control disabled" id="formGroupExampleInput" placeholder="Name" name="name" value="<?=$data['name']?>">
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="form-group col-md-6">
                <label for="inputState">Status</label>
                <select id="inputState" class="form-control" name="status">
                  <option value="">-- Choose --</option>
                  <option <?=$data['status'] === 'active' ? 'selected' : ''?> value="active">Active</option>
                  <option <?=$data['status'] === 'inactive' ? 'selected' : ''?> value="inactive">Inactive</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $this->endSection() ?>
