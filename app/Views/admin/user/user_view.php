<?php $this->extend('layout/template') ?>
<?php $this->Section('content') ?>
<div class="mt-2">
    <div class="table-responsive">
        <button type="button" class="btn btn-primary mb-3" onclick="addDataModal()">
            Add Data
        </button>

        <table id="datatablesSimple">
            <thead>
                <tr class="bg-info text-white">
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    foreach($data as $row): ?>
                    <tr>
                        <td width="1%"><?=$no++?></td>
                        <td><?=$row['username']?></td>
                        <td><?=$row['role']?></td>
                        <td><?=$row['email']?></td>
                        <td><a href="<?=base_url('user/delete?id='.$row['id'])?>" onclick="confirm('Are you sure delete data?')">Delete</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('user/create')?>" method="POST">
                    <div class="form-group">
                        <label for="label-username">Username</label>
                        <input name="username" class="form-control form-control" type="text" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <label for="label-email">Email</label>
                        <input name="email" type="email" class="form-control" id="label-email" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="label-role">Role</label>
                        <select name="role" class="form-control" id="label-role" required>
                            <option value="">-- Choose --</option>
                            <option value="eps">Eps</option>
                            <option value="amazone">Amazone</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Superadmin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="label-username">Password</label>
                        <input name="password" class="form-control form-control" type="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

function addDataModal() {
    // let urlImage = "<?=getenv('API_HOST')?>" + image
    // $('#imageModal').attr('src', urlImage)
    $('#myModal').modal('show')
}
</script>

<?php $this->endSection() ?>