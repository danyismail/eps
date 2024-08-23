@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                Please check the form below for errors
            </div>
            @endif

            <div class="table-responsive">
                <button type="button" class="btn btn-primary mb-3" onclick="addDataModal()">
                    Add Data
                </button>

                <table class="table" id="datatable-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $row)
                            <tr>
                                <td width="1%">{{$key + 1}}</td>
                                <td>{{$row->username}}</td>
                                <td>{{$row->role}}</td>
                                <td>{{$row->email}}</td>
                                <td><a href="<?=url('user/delete?id='.$row->id)?>" onclick="return confirm('Are you sure delete data?')">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                <form action="{{route('user.create')}}" method="POST">
                    {{ csrf_field() }}
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

@endsection