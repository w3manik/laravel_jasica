@extends('layouts.dashtar')
@section('title')
    Subcategory
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
                        <li class="breadcrumb-item active" aria-current="page">Subcategory</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Subcategory List</h4>
                        </div>
                        <div class="card-body">
                            <div class="div">
                                <input type="checkbox" id="checkAll">Mark All
                            </div>
                            <form action="{{ url('subcate/markdele') }}" method="post">
                                @csrf
                            <table class="table table-striped">
                                <tr>
                                    <th>Mark</th>
                                    <th>SL</th>
                                    <th>Category id</th>
                                    <th>subcategory name</th>
                                    <th>created at</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($subcategories as $subcategory)
                                <tr>
                                    <td><input type="checkbox" class="checked" name="mark_id[]" value="{{ $subcategory->id }}"></td>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ App\Models\Category::find($subcategory->category_id)->category_name }}</td>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ url('subcate/delete') }}/{{ $subcategory->id }}"><i class="fa fa-trash"></i></a>
                                        <a href="{{ url('subcate/edit') }}/{{ $subcategory->id }}"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <button type="submit" class="btn btn-primary">Mark Delete</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Subcategory</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/subcategory/insert') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="">Category Name</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">-- Select Category--</option>
                                        @foreach ($categories as $category)
                                            <option {{ old('category_id') == $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger mt-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Subcategory Name</label>
                                    <input value="{{ old('subcategory_name') }}" type="text" class="form-control" name="subcategory_name">
                                    @error('subcategory_name')
                                        <div class="alert alert-danger mt-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
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
</div>


@endsection

@section('footer_script')
@if (session('subcateogyad'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('subcateogyad') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('adsub'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'warning',
    title: '{{ session('adsub') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('sub'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'info',
    title: '{{ session('sub') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

<script>
     $('#checkAll').click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });
</script>

@endsection


