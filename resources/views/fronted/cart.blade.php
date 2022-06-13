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
                        <li class="breadcrumb-item active">Cart Page</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    @if (session('sucs'))
                        <div class="alert alert-info">
                            {{ session('sucs') }}
                        </div>
                    @endif

                    @if (session('onli'))
                        <div class="alert alert-info">
                            {{ session('onli') }}
                        </div>
                    @endif
                </div>
            </div>
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="{{ url('/cart/update') }}" method="POST">
                        @csrf
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $chk_btn_show = true;
                                    @endphp
                                    @forelse ($cart_info as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ url('/produt/details') }}/{{ $cart->product_id }}"><img class="img-responsive ml-15px" src="{{ asset('uplodes/product') }}/{{ App\models\product::find($cart->product_id)->product_image }}" alt="" /></a>
                                        </td>
                                        <td class="product-name"><a href="{{ url('/produt/details') }}/{{ $cart->product_id }}">{{ App\models\product::find($cart->product_id)->product_name }}</a>
                                        @if ($cart->product_quentity > App\models\product::find($cart->product_id)->product_quentity)
                                             <span class="badge badge-warning" style="background:rgb(179, 41, 6);color:white;">Stock Out</span>
                                             @php
                                                 $chk_btn_show = false;
                                             @endphp
                                        @endif

                                        <span class="badge badge-success" style="background:rgb(18, 214, 139);color:white;">In Stock {{ App\models\product::find($cart->product_id)->product_quentity }}</span>

                                        </td>
                                        <td class="product-price-cart"><span class="amount">{{ App\models\product::find($cart->product_id)->product_price }}</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="product_quentity[{{ $cart->id }}]"
                                                    value="{{ $cart->product_quentity }}" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal">{{ App\models\product::find($cart->product_id)->product_price * $cart->product_quentity }}</td>
                                        <td class="product-remove">
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ url('/cart/delete') }}/{{ $cart->id }}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $total = $total+(App\models\product::find($cart->product_id)->product_price * $cart->product_quentity);
                                    @endphp
                                    @empty
                                    <td colspan="6" class="text-center">No Cart Insert!</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-clear">
                                        <button type="submit">Update Cart</button>
                                    </div>
                                </form>
                                <div class="cart-shiping-update">
                                    <a href="{{ url('/produt/shop') }}">Continue Shopping</a>
                                </div>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-lm-30px">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                        <input type="text" value="{{ $cupon_name }}" required="" id="copon_name" />
                                        @if (session('cupon_epaired'))
                                            <div class="alert alert-warning">
                                                {{ session('cupon_epaired') }}
                                            </div>
                                        @endif
                                        @if (session('cupon_invalid'))
                                            <div class="alert alert-warning">
                                                {{ session('cupon_invalid') }}
                                            </div>
                                        @endif
                                        <button class="cart-btn-2" id="copon_btn" type="button">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-md-30px">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <h5>Total products <span>{{ $total }}</span></h5>
                                <h5>Discount ({{ $discount }})% <span>{{ (($total/100)*$discount) }}</span></h5>
                                <h4 class="grand-totall-title">Sub Total <span>{{ $total-(($total/100)*$discount) }}</span></h4>
                                @php
                                   session([
                                    'total_from_cart'=>$total,
                                    // 'product_id'=>$cart->product_id,
                                    'discount_from_cart'=>(($total/100)*$discount),
                                    ]);
                                @endphp
                                @if ($chk_btn_show)
                                    <a href="{{ url('/checkout') }}">Proceed to Checkout</a>
                                    @else
                                    <div class="alert alert-danger">
                                        Product Is out of Stock
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->

@endsection

@section('footer_script')



<script>
    $('#copon_btn').click(function(){
        var cupon_name = $('#copon_name').val();
        var carent_link = "{{ url('/cart') }}";
        var link_to_go = carent_link+'/'+cupon_name;
        window.location.href=link_to_go;
    });
</script>
@endsection

