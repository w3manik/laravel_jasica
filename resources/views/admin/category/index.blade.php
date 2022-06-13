@extends('layouts.dashtar')
@section('title')
    Category
@endsection
@section('content')
@include('layouts.nav')
<div class="page-wrapper">
<div class="page-content">
<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Home</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Category List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Sl</th>
                            <th>Category name</th>
                            <th>Added By</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td><a href="{{ url('category/delete') }}/{{ $category->id }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @empty
                        <td class="text-center" colspan="6">No Data Found</td>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('category/insert') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Add Category</label>
                            <input type="text" class="form-control" name="category_name">
                            @error('category_name')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
</div>

@endsection

@section('footer_script')
@if (session('adcat'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('adcat') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('catdel'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('catdel') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection




