<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Welcome: {{ $loged_user }}</div>

                <div class="alert alert-info">
                     <h4>Total User: {{ $total_usr }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <table class="table table-striped">
                       <tr>
                           <th>SL</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Created at</th>
                       </tr>
                       @foreach ($users as $user)
                       <tr>
                           <td>{{ $loop->index+1 }}</td>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->email }}</td>
                           <td>{{ $user->created_at->diffForHumans() }}</td>
                       </tr>
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add Youser</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/user/insert') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="">role</label>
                            <select name="role" class="form-control">
                                <option value="">---Select Role---</option>
                                <option value="2">Admin</option>
                                <option value="3">Shopkeeper</option>
                            </select>
                        </div>
                        <div class="mb-3">
                           <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('footer_script')
@if (session('usr'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('usr') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection
