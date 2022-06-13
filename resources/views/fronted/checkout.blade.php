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
                        <li class="breadcrumb-item active">Checkout Page</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    @auth
    @if(Auth::user()->role == 1)
  <!-- checkout area start -->
  <div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <form action="{{ url('/order/confirm') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="billing-info-wrap">
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Full Name</label>
                                <input name="name" value="{{ Auth::user()->name }}" type="text" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Email Address</label>
                                <input name="email" value="{{ Auth::user()->email }}"  type="email" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Phone</label>
                                <input name="phone" type="text" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="billing-select mb-4">
                                <label>Country</label>
                                <select name="country_id" id="select_country" class="js-example-basic-single">
                                    <option>Select a country</option>
                                    @foreach ($countries as $country)
                                         <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="billing-info mb-4">
                                <label>Town / City</label>
                                {{-- <input name="city_id" id="city_select" type="text" /> --}}
                                <select name="city_id" id="city_select">
                                    <option value="">-- Select City --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="billing-info mb-4">
                                <label>Your Address</label>
                                <input name="adress" placeholder="Apartment, suite, unit etc." type="text" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Postcode / ZIP</label>
                                <input name="postcode" type="text" />
                            </div>
                        </div>

                    </div>
                    <div class="additional-info-wrap">
                        <div class="additional-info">
                            <label>Order notes</label>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                name="notes"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 mt-md-30px mt-lm-30px ">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Total</li>
                                    <li>{{ session('total_from_cart') }}</li>
                                </ul>
                                <ul>
                                    <li class="order-total">Discount</li>
                                    <li>{{ session('discount_from_cart') }}</li>
                                </ul>
                                <ul>
                                    <li class="order-total">Subtotal</li>
                                    <li>{{ session('total_from_cart') - session('discount_from_cart') }}</li>
                                </ul>

                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="1" type="radio" name="payment_method" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Cash On Delevery
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" value="2" type="radio" name="payment_method" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              Pay with SSL Ecomeraz
                            </label>
                          </div>
                          <ul>
                            <li>
                                <input placeholder="Phone Number" type="text" class="form-control" name="phone">
                            </li>
                            {{-- <li>
                                <input placeholder="Pdoduct Quentity Here" type="text" class="form-control" name="product_quentity">
                            </li> --}}
                        </ul>
                          @if (session('payment'))
                              <div class="alert alert-warning">
                                  {{ session('payment') }}
                              </div>
                          @endif
                    </div>
                    <div class="Place-order mt-25">
                        <button type="submit" class="btn btn-danger" style="background: red;color:white;padding:10px 100px;">Place Order {{ session('product_id') }} </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout area end -->
@else
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="my-5">
                <h5 class="alert alert-info text-center">You are Not Customer -> <a href="{{ url('/home') }}">Home</a></h5>
            </div>
        </div>
    </div>
</div>
    @endif
    @else
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="my-5">
                    <h5 class="alert alert-info text-center">Please Loging -> <a href="{{ url('login') }}">Login</a></h5>
                </div>
            </div>
        </div>
    </div>
    @endauth

@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $('#select_country').change(function(){
            var country_id = $('#select_country').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/getcitylist',
                data:{country_id:country_id},
                success:function(data){
                    $('#city_select').html(data);
                    $('#city_select').select2();
                }
            });

        });


    </script>
@endsection


