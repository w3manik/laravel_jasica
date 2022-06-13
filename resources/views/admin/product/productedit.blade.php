@extends('layouts.dashtar')

@section('title')
    All Product
@endsection
@section('content')
@include('layouts.nav')
<div class="page-wrapper">
    <div class="page-content">
    <div>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product Edit</li>
                    </ol>
                </nav>
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
                            <form action="{{ url('/product/updated') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                    <input type="hidden" name="product_old_image" value="{{ $products->product_image }}">
                                    <label for="">Category Name</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">---select category---</option>
                                        @foreach ($categories as $category)
                                            <option {{ $products->category_id == $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Subcategory Name</label>
                                    <select name="subcategory_id" class="form-control">
                                        <option value="">---select category---</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option {{ $products->subcategory_id == $subcategory->id?'selected':'' }} value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" value="{{ $products->product_name }}" name="product_name">
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Price</label>
                                    <input type="text" class="form-control" value="{{ $products->product_price }}" name="product_price">
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control">{{ $products->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Quantity</label>
                                    <input type="text" value="{{ $products->product_quentity }}" class="form-control" name="product_quentity">
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control" name="product_image">
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
</div>
@endsection
