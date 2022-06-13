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
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Subcategory Edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('subcate/update') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="">Category Name</label>
                                    <input type="hidden" name="subcategory_id" value="{{ $subcategories->id }}">
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                             <option {{ $subcategories->category_id == $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Subcategory Name</label>
                                    <input value="{{ $subcategories->subcategory_name }}" type="text" class="form-control" name="subcategory_name">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Updated</button>
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
@if (session('subupdt'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('subupdt') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection
