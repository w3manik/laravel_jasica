@extends('fronted.main')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Products</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px m-auto">
                    <div class="dels_bigimg_slider" class="m-auto">
                        <div class="dels_item_slider">
                            <img src="{{ asset('uplodes/product') }}/{{ $produt_info->product_image }}" class="img-fluid w-100" alt="">
                        </div>
                        @foreach (App\Models\product_thumbl::where('product_id', $produt_info->id)->get() as $prdthm)
                        <div class="dels_item_slider"  class="m-auto">
                            <img src="{{ asset('/uplodes/product/thumbles') }}/{{ $prdthm->product_thumbles }}" class="img-fluid w-100" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="dels_sml_slider">
                        @foreach (App\Models\product_thumbl::where('product_id', $produt_info->id)->get() as $prdthm)
                        <div class="dels_sml_item">
                            <img src="{{ asset('/uplodes/product/thumbles') }}/{{ $prdthm->product_thumbles }}" class="img-fluid w-100" alt="">
                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2>{{ $produt_info->product_name }}</h2>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">BDT: {{ $produt_info->product_price }}</li>
                            </ul>
                        </div>
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                @php
                                if(App\Models\order::where('product_id', $produt_info->id)->whereNotNull('star')->count('star') == 0) {
                                    $star_amount = 0;
                                }
                                else {
                                    $star_amount_count = (App\Models\order::where('product_id', $produt_info->id)->whereNotNull('star')->sum('star')) / App\Models\order::where('product_id', $produt_info->id)->whereNotNull('star')->count('star');
                                      $star_amount = round($star_amount_count);
                                }


                                @endphp

                                @if ($star_amount == 1)
                                    <li><i class="fa fa-star"></i></li>
                                @elseif($star_amount == 2)
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                @elseif($star_amount == 3)
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                @elseif($star_amount == 4)
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                @elseif($star_amount == 5)
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                @else
                                    <li>No Review Yet!</li>
                                @endif
                            </div>
                            {{-- <li class="read-review">( {{ App\Models\order::where('product_id', $produt_info->id)->whereNotNull('star')->count('star') }} Customer Review )</li> --}}
                            <li>({{ App\Models\order::where('product_id', $produt_info->id)->whereNotNull('star')->count('star') }} Customar Review)</li>
                        </div>
                        <p class="mt-30px mb-0">{{ $produt_info->description }}</p>
                        @if ($produt_info->product_quentity > 0)
                        <form action="{{ url('/add/tocart') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $produt_info->id }}">
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="product_quentity" value="1" />
                            </div>
                            <div class="pro-details-cart">
                                <button class="add-cart" href="#"> Add To Cart</button>
                            </div>
                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                            </div>
                            <div class="pro-details-compare-wishlist pro-details-compare">
                                <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                            </div>
                        </div>
                        </form>
                        @else
                        <div class="alert alert-info">
                            <p>Product Is out Of Stuck</p>
                        </div>
                        @endif
                        <div class="pro-details-sku-info pro-details-same-style  d-flex">
                            <span>SKU: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">Ch-256xl</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Categories: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">Fashion.</a>
                                </li>
                                <li>
                                    <a href="#">eCommerce</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-social-info pro-details-same-style d-flex">
                            <span>Share: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- product details description area start -->
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details2">Information</a>
                    <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                    <a data-bs-toggle="tab" href="#des-details3">Reviews (02)</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane">
                        <div class="product-anotherinfo-wrapper text-start">
                            <ul>
                                <li><span>Weight</span> 400 g</li>
                                <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                                <li><span>Materials</span> 60% cotton, 40% polyester</li>
                                <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-wrapper">
                            <p>

                                Lorem ipsum dolor sit amet, consectetur adipisi elit, incididunt ut labore et. Ut enim
                                ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commol
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste
                                natus error sit voluptatem accusantiulo doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                explicabo. Nemo enim ipsam voluptat quia voluptas sit aspernatur aut odit aut fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
                                quia non numquam eius modi tempora incidunt ut labore

                            </p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="review-wrapper">
                                    @foreach(App\Models\order::where('product_id', $produt_info->id)->whereNotNull('review')->get() as $review)
                                    <div class="single-review">
                                        <div class="review-img">
                                            {{-- <img src="{{ asset('uplodes/profile') }}/{{ App\Models\profile::find($review->user_id)->profile_photo }}" alt="" /> --}}
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>{{ App\Models\User::find($review->user_id)->name }}</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                       @if ($review->star == 1)
                                                            <i class="fa fa-star"></i>
                                                        @elseif ($review->star == 2)
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        @elseif ($review->star == 3)
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        @elseif ($review->star == 4)
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        @elseif ($review->star == 5)
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        @else
                                                            No Review Yet!
                                                       @endif


                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>
                                                    {{ $review->review }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-7">
                                @auth
                                @if (App\Models\order::where('user_id', Auth::id())->where('product_id', $produt_info->id)->whereNull('review')->exists())
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Add a Review</h3>
                                    <div class="ratting-form">
                                            <div class="star-box">
                                                <span>Your rating:</span>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>task</th>
                                                            <th>1 Star</th>
                                                            <th>2 Star</th>
                                                            <th>3 Star</th>
                                                            <th>4 Star</th>
                                                            <th>5 Star</th>
                                                        </tr>
                                                    </thead>
                                                    <form action="{{ url('/review') }}" method="post">
                                                    @csrf
                                                    <tbody>
                                                        <tr>
                                                            <td>How Many Stars?</td>
                                                            <td>
                                                                <input value="{{ $produt_info->id }}" type="hidden" name="product_id" />
                                                                <input value="1" type="radio" name="star" />
                                                            </td>
                                                            <td>
                                                                <input value="2" type="radio" name="star" />
                                                            </td>
                                                            <td>
                                                                <input value="3" type="radio" name="star" />
                                                            </td>
                                                            <td>
                                                                <input value="4" type="radio" name="star" />
                                                            </td>
                                                            <td>
                                                                <input value="5" type="radio" name="star" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="rating-form-style">
                                                        <input value="{{ Auth::user()->name }}" placeholder="Name" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="rating-form-style">
                                                        <input value="{{ Auth::user()->email }}" placeholder="Email" type="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea name="review" placeholder="Message"></textarea>
                                                        <button class="btn btn-primary btn-hover-color-primary "
                                                            type="submit" value="Submit">Submit</button>

                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                    </div>
                                </div>
                                @else
                                <div class="alert alert-success">
                                    <p>You Alredy Review This Product or u dont prouched this product</p>
                                </div>
                                @endif
                                @else
                                <div class="alert alert-success">
                                    <p>Please Login For Review -> <a href="{{ url('login') }}">Login</a> </p>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->

    <!-- Related product Area Start -->
    <div class="related-product-area pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px line-height-1">
                        <h2 class="title m-0">Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="new-product-slider slider-nav-style-1 small-nav">
                <div class="new-product-wrapper swiper-wrapper">
                    @foreach ($related_product as $relproduct)
                    <div class="new-product-item">
                        <!-- Single Prodect -->
                        <div class="product">
                            <div class="thumb">
                                <a href="{{ url('/produt/details') }}/{{ $relproduct->id }}" class="image">
                                    <img src="{{ asset('uplodes/product') }}/{{ $relproduct->product_image }}" alt="Product" />
                                </a>
                                <span class="badges">
                                    <span class="new">New</span>
                                </span>
                                <div class="actions">
                                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                            class="pe-7s-like"></i></a>
                                    <a href="#" class="action quickview" data-link-action="quickview"
                                        title="Quick view" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                    <a href="compare.html" class="action compare" title="Compare"><i
                                            class="pe-7s-refresh-2"></i></a>
                                </div>
                                <button title="Add To Cart" class=" add-to-cart">Add
                                    To Cart</button>
                            </div>
                            <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                                <h5 class="title"><a href="{{ url('/produt/details') }}/{{ $relproduct->id }}">{{ $relproduct->product_name }}
                                    </a>
                                </h5>
                                <span class="price">
                                    <span class="new">{{ $relproduct->product_price }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related product Area End -->

@endsection



