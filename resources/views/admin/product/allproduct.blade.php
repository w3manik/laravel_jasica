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
                        <li class="breadcrumb-item active" aria-current="page">All Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Product List:</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Sl</th>
                                    <th>Category Name</th>
                                    <th>Subcategory name</th>
                                    <th>Prouct Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>quantity</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ App\Models\Category::find($product->category_id)->category_name }}</td>
                                    <td>{{ App\Models\Subcategory::find($product->subcategory_id)->subcategory_name }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->product_quentity }}</td>
                                    <td>
                                        <img width="50" src="{{ asset('uplodes/product') }}/{{ $product->product_image }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ url('/prdouct/delete') }}/{{ $product->id }}"><i class="fa fa-trash"></i></a>
                                        <a href="{{ url('/prdouct/edit') }}/{{ $product->id }}"><i class="fa fa-pencil"></i></a
                                    ></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
</div>
@endsection


@section('footer_script')
@if (session('productde'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('productde') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('Produpd'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('Produpd') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@endsection
