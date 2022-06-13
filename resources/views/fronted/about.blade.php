@extends('fronted.main')

@section('content')
        <!-- About Intro Area start-->
        <div class="about-intro-area">
            <div class="container position-relative h-100 d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        @foreach ($abouts as $about)
                        <div class="about-intro-content">
                            <h2 class="title">{{ $about->head }}</h2>
                            <p>{{ $about->message }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="intro-left">
                    <img src="{{ asset('websit/images/about-image/intro-left.png')}}" alt="" class="intro-left-image">
                </div>
                @foreach ($abouts as $about_pc)
                <div class="intro-right">
                    <img src="{{ asset('uplodes/about') }}/{{ $about_pc->abt_image }}" alt="" class="intro-right-image">
                </div>
                @endforeach
            </div>
        </div>

        <!-- About Intro Area End-->

        <!-- Service Area Start -->

        <div class="service-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="service-left align-self-center align-items-center">
                            <img src="{{ asset('websit/images/about-image/srevice-left-img.png') }}" alt="" class="service-left-image">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        @foreach ($aboutitles as $abulist)
                        <div class="service-right-content align-self-center align-items-center">
                            <span class="sami-title">100% Guaranteed Pure Cotton</span>
                            <h2 class="title">{{ $abulist->title }}</h2>
                            <p>{{ $abulist->des }}</p>
                            <a href="{{ url('/produt/shop') }}/{{ $abulist->product_id }}" class="btn btn-primary service-btn">Shop Now<i
                                    class="fa fa-shopping-basket ml-10px" aria-hidden="true"></i></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Area End -->

        <!-- Team Area Start -->

        <div class="team-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-30px0px">
                            <h2 class="title line-height-1">#ourteam</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($teams as $team)
                    <div class="col-md-4 mb-lm-30px">
                        <!-- Single Team -->

                        <div class="team-wrapper">
                            <div class="team-image overflow-hidden">
                                <img src="{{ asset('uplodes/team') }}/{{ $team->tem_image }}" alt="">
                            </div>
                            <div class="team-content">
                                <h6 class="title">{{ $team->name }}</h6>
                                <span class="sub-title">{{ $team->Work }}</span>
                            </div>
                            <ul class="team-social d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>

                        <!-- Single Team -->
                    </div>
                    @endforeach
                    {{-- <div class="col-md-4 mb-lm-30px">
                        <!-- Single Team -->
                        <div class="team-wrapper">
                            <div class="team-image overflow-hidden">
                                <img src="assets/images/team/2.jpg" alt="">
                            </div>
                            <div class="team-content">
                                <h6 class="title">Lester Houser</h6>
                                <span class="sub-title">Our Team</span>
                            </div>
                            <ul class="team-social d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                        <!-- Single Team -->
                    </div>
                    <div class="col-md-4">
                        <!-- Single Team -->
                        <div class="team-wrapper">
                            <div class="team-image overflow-hidden">
                                <img src="assets/images/team/3.jpg" alt="">
                            </div>
                            <div class="team-content">
                                <h6 class="title">Craig Chaney</h6>
                                <span class="sub-title">Our Team</span>
                            </div>
                            <ul class="team-social d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                        <!-- Single Team -->
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Team Area End -->

        <!-- Feature Area Srart -->
        <div class="feature-area pb-100px pt-100px bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <!-- single item -->
                        <div class="single-feature border-0">
                            <div class="feature-icon">
                                <img src="assets/images/icons/1.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Free Shipping</h4>
                                <span class="sub-title">Capped at $39 per order</span>
                            </div>
                        </div>
                    </div>
                    <!-- single item -->
                    <div class="col-lg-4 col-md-6 mb-md-30px mb-lm-30px mt-lm-30px">
                        <div class="single-feature border-0">
                            <div class="feature-icon">
                                <img src="assets/images/icons/2.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Card Payments</h4>
                                <span class="sub-title">12 Months Installments</span>
                            </div>
                        </div>
                    </div>
                    <!-- single item -->
                    <div class="col-lg-4 col-md-6 ">
                        <div class="single-feature border-0">
                            <div class="feature-icon">
                                <img src="assets/images/icons/3.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Easy Returns</h4>
                                <span class="sub-title">Shop With Confidence</span>
                            </div>
                        </div>
                        <!-- single item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Area End -->

        <!-- Testimonial Area Start -->
        <div class="testimonial-area pb-40px pt-100px ">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-0">
                            <h2 class="title line-height-1">#testimonials</h2>
                        </div>
                    </div>
                </div>
                <!-- Slider Start -->
                <div class="testimonial-wrapper swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Slider Single Item -->
                        @foreach ($testimonials as $testi)
                        <div class="swiper-slide">
                            <div class="testi-inner">
                                <div class="reating-wrap">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="testi-content">
                                    <p>{{ $testi->descp }}</p>
                                </div>
                                <div class="testi-author">
                                    <div class="author-img">
                                        <img src="{{ asset('uplodes/testimonial') }}/{{ $testi->testimonial_image }}" alt="">
                                    </div>
                                    <div class="author-name">
                                        <h4 class="name">{{ $testi->name }}</h4>
                                        <span class="title">Happy Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <!-- Slider Single Item -->
                        <div class="swiper-slide">
                            <div class="testi-inner">
                                <div class="reating-wrap">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="testi-content">
                                    <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                    </p>
                                </div>
                                <div class="testi-author">
                                    <div class="author-img">
                                        <img src="assets/images/testimonial-image/2.png" alt="">
                                    </div>
                                    <div class="author-name">
                                        <h4 class="name">Leah Chatman</h4>
                                        <span class="title">Happy Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Single Item -->
                        <div class="swiper-slide">
                            <div class="testi-inner">
                                <div class="reating-wrap">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="testi-content">
                                    <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                    </p>
                                </div>
                                <div class="testi-author">
                                    <div class="author-img">
                                        <img src="assets/images/testimonial-image/3.png" alt="">
                                    </div>
                                    <div class="author-name">
                                        <h4 class="name">Reyna Chung</h4>
                                        <span class="title">Happy Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Single Item -->
                        <div class="swiper-slide">
                            <div class="testi-inner">
                                <div class="reating-wrap">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="testi-content">
                                    <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                    </p>
                                </div>
                                <div class="testi-author">
                                    <div class="author-img">
                                        <img src="assets/images/testimonial-image/1.png" alt="">
                                    </div>
                                    <div class="author-name">
                                        <h4 class="name">Daisy Morgan</h4>
                                        <span class="title">Happy Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Single Item -->
                        <div class="swiper-slide">
                            <div class="testi-inner">
                                <div class="reating-wrap">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="testi-content">
                                    <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                    </p>
                                </div>
                                <div class="testi-author">
                                    <div class="author-img">
                                        <img src="assets/images/testimonial-image/2.png" alt="">
                                    </div>
                                    <div class="author-name">
                                        <h4 class="name">Reyna Chung</h4>
                                        <span class="title">Happy Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Single Item --> --}}
                    </div>
                </div>
                <!-- Slider Start -->
            </div>
        </div>
        <!-- Testimonial Area End -->

        <!-- Brand area start -->
        <div class="brand-area pb-100px">
            <div class="container">
                <div class="brand-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($aboutlogos as $ablogo)
                        <div class="swiper-slide brand-slider-item text-center">
                            <a href="#"><img class=" img-fluid" src="{{ asset('uplodes/ablogo') }}/{{ $ablogo->about_pic }}" alt="" /></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand area end -->

@endsection
