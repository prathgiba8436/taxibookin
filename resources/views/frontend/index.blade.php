@extends('frontend.layouts.master')
@section('title','TAXI || TRANG CHỦ')
@section('main-content')
<!-- Slider Area -->
{{-- <section class="hero-slider"> --}}

</section>

@if(count($banners)>0)
    <section id="Gslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
        <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
                @foreach($banners as $key=>$banner)
                <div class="carousel-item {{(($key==0)? 'active' : '')}}" style="background: url('{{$banner->photo}}');
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h1 style="color: #fff" class="wow fadeInDown">{{$banner->title}}</h1>
                        <p style="color: rgb(178,245 ,170);line-height: 1.5;">{!! html_entity_decode($banner->description) !!}</p>
                        <a class="btn btn-lg ws-btn wow fadeInUpBig" href="{{route('checkout')}}" 
                        style="border-radius:20px;color: rgb(85, 180, 209)" role="button"><i class="fa fa-car"></i>  Đặt xe ngay
                        <i class="far fa-arrow-alt-circle-right"></i>
                    </a>
                    {{-- <i style="color: rgb(85, 180, 209)" class="fa fa-exchange"></i> --}}
                      
                   
                    <a href="tel:0933007858" target="_self" class="btn btn-lg ws-btn wow fadeInUpBig" style="color: rgb(85, 180, 209);border-radius:20px; text-align: center; font-size: 15px">
                        
                        <div class='quick-alo-ph-circle'></div>
                        <div class='quick-alo-ph-circle-fill'></div>
                        <div class='quick-alo-ph-btn-icon quick-alo-phone-img-circle'></div>
                            <span style="padding:20px">Gọi xe ngay</span>
                        </a>
    
                

                    </div>
                </div>  
            @endforeach   
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Trước</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Sau</span>
        </a>
    </section>
@endif

<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            @php 
            $category_lists=DB::table('categories')->where('status','active')->limit(3)->get();
            @endphp
            @if($category_lists)
                @foreach($category_lists as $cat)
                    @if($cat->is_parent==1)
                        <!-- Single Banner  -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-banner">
                                @if($cat->photo)
                                    <img src="{{$cat->photo}}" alt="{{$cat->photo}}">
                                @else
                                    <img src="https://via.placeholder.com/600x370" alt="#">
                                @endif
                                <div class="content">
                                    <h2  style="color: #ffffff;">{{$cat->title}}</h2>
                                    {{-- <a style="border-radius:20px;" href="{{route('checkout',$cat->slug)}}">Đặt xe ngay</a> --}}
                                    <a href="tel:0793727282" target="_self" class="btn btn-lg ws-btn wow fadeInUpBig" style="border-radius:20px; text-align: center; font-size: 15px">
                            
                                        <i style="color: rgb(85, 180, 209)" class="fa fa-phone"></i>
                                            <span style="color: rgb(85, 180, 209);">0793 727 282</span>
                                        </a>
                                        
                                    <a href="tel:0933007858" target="_self" class="btn btn-lg ws-btn wow fadeInUpBig" style="border-radius:20px; text-align: center; font-size: 15px">
                            
                                        <i style="color: rgb(85, 180, 209)" class="fa fa-phone"></i>
                                            <span style="color: rgb(85, 180, 209);">0933 007 858</span>
                                        </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>TAXI GIÁ RẺ</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">        
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist">
                                @php 
                                    $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                                    // dd($categories);
                                @endphp
                                @if($categories)
                                <button class="btn" style="background:black"data-filter="*">
                                    Tất cả
                                </button>
                                    @foreach($categories as $key=>$cat)
                                    
                                    <button class="btn" style="background:none;color:black;"data-filter=".{{$cat->id}}">
                                        {{$cat->title}}
                                    </button>
                                    @endforeach
                                @endif
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content isotope-grid" id="myTabContent">
                             <!-- Start Single Tab -->
                            @if($product_lists)
                                @foreach($product_lists as $key=>$product)
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->cat_id}}">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                @php 
                                                    $photo=explode(',',$product->photo);
                                                // dd($photo);
                                                @endphp
                                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">

                                                
                                                @if($product->condition=='new')
                                                    <span class="new">Mới</span
                                                @elseif($product->condition=='hot')
                                                    <span class="hot">Hot</span>
                                                @else
                                                    <span class="price-dec">{{$product->discount}}% Giảm giá</span>
                                                @endif

                                                
                                            </a>
                                            
                                            <div class="button-head">
                                                {{-- <div class="product-action"> --}}
                                                <hr>
                                                    <a href="tel:0933007858" target="_self" class="button primary" style="border-radius:10px; text-align: center; font-size: 15px">
                                                        <i class="fa fa-phone"> </i>  <span>Gọi ngay 0933 007 858</span>
                                                        </a>
                                                    {{-- <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>Quan tâm</span></a> --}}
                                                {{-- </div> --}}

                                            </div>
                                            <div class="button-head">
                                                {{-- <div class="product-action"> --}}
                                                <hr>
                                                    <a href="tel:0793727282" target="_self" class="button primary" style="border-radius:10px; text-align: center; font-size: 15px">
                                                        <i class="fa fa-phone"> </i>  <span>Gọi ngay 0793 727 282</span>
                                                        </a>
                                                    {{-- <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>Quan tâm</span></a> --}}
                                                {{-- </div> --}}

                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="#">{{$product->title}}</a></h3>

                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach

                             <!--/ End Single Tab -->
                            @endif
                       
                        <!--/ End Single Tab -->
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<section class="midium-banner">
    <div class="container">
        <div class="row">
            @if($featured)
                @foreach($featured as $data)
                    <!-- Single Banner  -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner">
                            @php 
                                $photo=explode(',',$data->photo);
                            @endphp
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                            <div class="content">
                                <h5 style="color: rgb(234, 247, 241)">{{$data->cat_info['title']}}</h5>
                                <h3 style="color: rgb(178,245 ,170)">{{$data->title}} <br> Giảm<span style="color: #fd6666"> {{$data->discount}}%</span></h3>
                                <a style="border-radius:20px;" href="{{route('checkout',$data->slug)}}">Đặt xe ngay</a>
                                <a href="tel:0933007858" target="_self" class="btn btn-lg ws-btn wow fadeInUpBig" style="border-radius:20px; text-align: center; font-size: 15px">
                        
                                    <div class='quick-alo-ph-circle'></div>
                                    <div class='quick-alo-ph-circle-fill'></div>
                                    <div class='quick-alo-ph-btn-icon quick-alo-phone-img-circle'></div>
                                        <span style="color: rgb(85, 180, 209);padding:20px">Gọi xe ngay</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Midium Banner -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>DỊCH VỤ HOT!!!</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($product_lists as $product)
                        @if($product->condition=='hot')
                            <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="#">
                                    @php 
                                        $photo=explode(',',$product->photo);
                                    // dd($photo);
                                    @endphp
                                    <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    
                                </a>
                            </div>
                            
                            <div class="product-content">
                                <h3><a href="#">{{$product->title}}</a></h3>
                                <div class="product-price">
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Home List  -->
<section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>TOUR MỚI NHẤT</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                    @endphp
                    @foreach($product_lists as $product)
                        <div class="col-md-4">
                            <!-- Start Single List  -->
                            <div class="single-list">
                                <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        @php 
                                            $photo=explode(',',$product->photo);
                                            // dd($photo);
                                        @endphp
                                        <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title"><a href="#">{{$product->title}}</a></h4>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- End Single List  -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>BLOG</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if($posts)
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog  -->
                        <div class="shop-single-blog">
                            <img src="{{$post->photo}}" alt="{{$post->photo}}">
                            <div class="content">
                                <p class="date">{{$post->created_at->format('d M , Y. D')}}</p>
                                <a href="{{route('blog.detail',$post->slug)}}" class="title">{{$post->title}}</a>
                                <a href="{{route('blog.detail',$post->slug)}}" class="more-btn">Đọc tiếp</a>
                            </div>
                        </div>
                        <!-- End Single Blog  -->
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</section>
<!-- End Shop Blog  -->
<!-- Start Quick Buttons By share123bloggertemplates.com -->
<div class='quick-call-button'></div>
    <div class='call-now-button'>
        <div><p class='call-text'><a href='tel:0933007858' title='Liên Hệ Chúng Tôi' > Liên Hệ Chúng Tôi </a></p>
            <a href='tel:0933007858' title='Liên Hệ Chúng Tôi' >
                <div class='quick-alo-ph-circle'></div>
                <div class='quick-alo-ph-circle-fill'></div>
                <div class='quick-alo-ph-btn-icon quick-alo-phone-img-circle'></div>
            </a>
        </div>
    </div>

<!-- /End Quick Buttons By Share123bloggertemplates.com -->
<link rel='stylesheet' id='lv_css-css'  href='https://cdn.jsdelivr.net/gh/hongblogger/2019@master/quick-call-button-hong.css' type='text/css' media='all' />
<!--nut goi share123bloggertemplates.com-->
<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>NHANH CHÓNG, AN TOÀN</h4>
                    <p>Các dòng xe đời mới có tốc độ cao, hiện đại</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>ĐƯA ĐÓN TẬN NƠI</h4>
                    <p>Gửi vị trí, có xe đến đón bạn ngay</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>BẢO MẬT THÔNG TIN</h4>
                    <p>Thông tin của quý khách được bảo mật tuyệt đối</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>DỊCH VỤ TỐT, GIÁ TỐT</h4>
                    <p>Cung cấp trải nghiệm tuyệt vời với mức giá phải chăng</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->
<div class="map-section">
    <div id="myMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31375.769241160542!2d107.03386930341374!3d10.581428102946044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317513ccf0d3f131%3A0xbf363176e248961b!2zVFQuIFBow7ogTeG7uSwgVMOibiBUaMOgbmgsIELDoCBS4buLYSAtIFbFqW5nIFTDoHUsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1635699797945!5m2!1svi!2s"  width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

@endsection

@push('styles')
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;
        }

        #Gslider .carousel-inner{
        /* height: 550px; */
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
            height: inherit;
            background-size: contain;
        }

        #Gslider .carousel-inner .carousel-caption {
            background: rgba(0,0,0,0.3);
            /* top: 50%; */
            /* bottom: 60%; */
            width: 100%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #f7c41d;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 30px;
        color: rgb(178,245 ,170);
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
        /* @media (min-width: 768px)
        {
            #Gslider .carousel-inner .carousel-caption {
                bottom: 50%;
            }
        }
        @media (min-width: 980px)
        {
            #Gslider .carousel-inner .carousel-caption {
                bottom: 30%;
            }
        } */
        .midium-banner .single-banner .content {
            text-align: center;
            position: absolute;
            top: 85%;
            transform: translateY(-50%);
            width: 100%;
            background: rgba(0,0,0,0.3);

        }

        @media screen and (max-width: 1920px) {
        .call-now-button { display: flex !important; background: #d818db; }
        .quick-call-button { display: block !important; }
        }
                    @media screen and (min-width: px) {
        .call-now-button .call-text { display: none !important; }
        }
        @media screen and (max-width: 1024px) {
        .call-now-button .call-text { display: none !important; }
        }
        .call-now-button { top: 80%; }
        .call-now-button { left: 3%; }
        .call-now-button { background: #d818db; }
        .quick-alo-ph-btn-icon { background-color: #ffffff !important; }
        .call-now-button .call-text { color: #fff; }
    
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        
        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });
            
        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

@endpush
