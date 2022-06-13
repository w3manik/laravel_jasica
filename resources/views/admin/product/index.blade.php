@extends('layouts.dashtar')

@section('title')
    Add Product
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
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/product/insert') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Category Name</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">---select category---</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Subcategory Name</label>
                                    <select name="subcategory_id" class="form-control">
                                        <option value="">---select category---</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                    </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" name="product_name">
                                    @error('product_name')
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Price</label>
                                    <input type="text" class="form-control" name="product_price">
                                    @error('product_price')
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                    @error('description')
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Quantity</label>
                                    <input type="text" class="form-control" name="product_quentity">
                                    @error('product_quentity')
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control" name="product_image">
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Thumblers</label>
                                    <input type="file" class="form-control" multiple name="product_thumbles[]">
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
@if (session('prodad'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('prodad') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection
