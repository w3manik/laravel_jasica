@extends('fronted.main')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Shop</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

        <!-- Wishlist Area Start -->
        <div class="cart-main-area pt-100px pb-100px">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Subtotal</th>
                                            <th>Qty</th>
                                            <th>Add To Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wish_products as $wishlsh)
                                        <tr>
                                            <td class="product-thumbnail">
                                                {{-- <a href="#"><img class="img-responsive ml-15px" src="{{ asset('uplodes/product') }}/{{ $wishlsh-> }}" alt="" /></a> --}}
                                            </td>
                                            <td class="product-name"><a href="#">Product Name</a></td>
                                            <td class="product-price-cart"><span class="amount">$60.00</span></td>
                                            <td class="product-subtotal">$70.00</td>
                                        </form>
                                            <form action="{{ url('/addto/wishlist') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $wishlsh->id }}">
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="product_quentity" value="1" />
                                                </div>
                                            </td>
                                            <td class="product-wishlist-cart">
                                                <button type="submit" style="background: red;color:white;padding:9px 9px">Add to cart</button>
                                            </td>
                                        </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Wishlist Area End -->

@endsection
