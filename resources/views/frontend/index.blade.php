@extends('frontend.main_master')
@section('content')
@section('title')
Home Restaurant Shop
@endsection



<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div id="hero">
        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

            @foreach($sliders as $slider)
            <div id="sliderImage" class="item pb-5" style="background-image: url({{ asset($slider->slider_img) }});">
                <div class="container-fluid">
                    <div class="caption bg-color vertical-center text-left">

                        <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span>
                        </div>
                        <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                                class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                        </div>
                    </div>
                    <!-- /.caption -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
            @endforeach


        </div>
        <!-- /.owl-carousel -->
    </div>
    <div class="container">
        <div class="row">
            <div id="hero">
                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                    @foreach($sliders as $slider)
                    <div id="sliderImage" class="item pb-5"
                        style="background-image: url({{ asset($slider->slider_img) }});">
                        <div class="container-fluid">
                            <div class="caption bg-color vertical-center text-left">

                                <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
                                <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span>
                                </div>
                                <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                                        class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.item -->
                    @endforeach


                </div>
                <!-- /.owl-carousel -->
            </div>
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">





                <!-- === == TOP NAVIGATION == ==== -->
                @include('frontend.common.vertical_menu')
                <!-- ===== ==== TOP NAVIGATION : END ==== ===== -->


                <!-- === ===== HOT DEALS ======= ===== -->
                @include('frontend.common.hot_deals')
                <!-- === === HOT DEALS: END ====== ===== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Offer</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">



                            <div class="item">
                                <div class="products special-product">

                                    @foreach($special_offer as $product)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a
                                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                                <img src="{{ asset($product->product_thambnail) }}"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a
                                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('locale')
                                                                == 'ar') {{ $product->product_name_ar }} @else
                                                                {{ $product->product_name_en }} @endif</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price">
                                                                ${{ $product->selling_price }} </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    @endforeach
                                    <!-- // end special offer foreach -->





                                </div>
                            </div>










                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->



                <!-- ===== ===== PRODUCT TAGS ==== ====== -->
                @include('frontend.common.product_tags')
                <!-- ==== ===== PRODUCT TAGS : END ======= ==== -->




                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


                            <div class="item">
                                <div class="products special-product">

                                    @foreach($special_deals as $product)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a
                                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                                <img src="{{ asset($product->product_thambnail) }}"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a
                                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('locale')
                                                                == 'ar') {{ $product->product_name_ar }} @else
                                                                {{ $product->product_name_en }} @endif</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price">
                                                                ${{ $product->selling_price }} </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    @endforeach
                                    <!-- // end special deals foreach -->




                                </div>
                            </div>



                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->

                <!-- == ==== Testimonials=== ===== -->

                <!-- === ======== Testimonials: END ==== =========== -->


            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">




                <!-- === ========= SECTION – HERO ==== ======= -->



                <!-- ==== ===== SECTION – HERO : END === ============== -->










                <!-- ============================================== INFO BOXES ============================================== -->

                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->








                <!-- = ===== SCROLL TABS =============== ========== -->

                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a>
                            </li>

                            @foreach($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                    data-toggle="tab">{{ $category->category_name_en }}</a></li>
                            @endforeach

                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">



                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img
                                                                src="{{ asset($product->product_thambnail) }}"
                                                                alt=""></a> </div>
                                                    <!-- /.image -->

                                                    @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp

                                                    <div>
                                                        @if ($product->discount_price == NULL)
                                                        <div class="tag new"><span>new</span></div>
                                                        @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                            @if(session()->get('locale') == 'ar')
                                                            {{ $product->product_name_ar }} @else
                                                            {{ $product->product_name_en }} @endif
                                                        </a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if ($product->discount_price == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            ${{ $product->selling_price }} </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price">
                                                            ${{ $product->discount_price }} </span> <span
                                                            class="price-before-discount">$
                                                            {{ $product->selling_price }}</span> </div>
                                                    @endif


                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">


                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Add Cart" data-toggle="modal"
                                                                    data-target="#exampleModal" id="{{ $product->id }}"
                                                                    onclick="productView(this.id)"> <i
                                                                        class="fa fa-shopping-cart"></i> </button>

                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Add to cart</button>
                                                            </li>



                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Wishlist" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)"> <i
                                                                    class="fa fa-heart"></i> </button>

                                                            <li class="lnk"> <a data-toggle="tooltip"
                                                                    class="add-to-cart" href="detail.html"
                                                                    title="Compare"> <i class="fa fa-signal"
                                                                        aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    @endforeach
                                    <!--  // end all optionproduct foreach  -->




                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->




                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @php
                                    $catwiseProduct =
                                    App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp


                                    @forelse($catwiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img
                                                                src="{{ asset($product->product_thambnail) }}"
                                                                alt=""></a> </div>
                                                    <!-- /.image -->

                                                    @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp

                                                    <div>
                                                        @if ($product->discount_price == NULL)
                                                        <div class="tag new"><span>new</span></div>
                                                        @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                            @if(session()->get('locale') == 'ar')
                                                            {{ $product->product_name_ar }} @else
                                                            {{ $product->product_name_en }} @endif
                                                        </a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if ($product->discount_price == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            ${{ $product->selling_price }} </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price">
                                                            ${{ $product->discount_price }} </span> <span
                                                            class="price-before-discount">$
                                                            {{ $product->selling_price }}</span> </div>
                                                    @endif


                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">

                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Add Cart" data-toggle="modal"
                                                                    data-target="#exampleModal" id="{{ $product->id }}"
                                                                    onclick="productView(this.id)"> <i
                                                                        class="fa fa-shopping-cart"></i> </button>

                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Add to cart</button>
                                                            </li>



                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Wishlist" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)"> <i
                                                                    class="fa fa-heart"></i> </button>


                                                            <li class="lnk"> <a data-toggle="tooltip"
                                                                    class="add-to-cart" href="detail.html"
                                                                    title="Compare"> <i class="fa fa-signal"
                                                                        aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->

                                    @empty
                                    <h5 class="text-danger">No Product Found</h5>

                                    @endforelse
                                    <!--  // end all optionproduct foreach  -->




                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @endforeach
                        <!-- end categor foreach -->





                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->


                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->




                <!-- == === FEATURED PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Featured products</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                        @foreach($featured as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img
                                                    src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                                        <!-- /.image -->

                                        @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount/$product->selling_price) * 100;
                                        @endphp

                                        <div>
                                            @if ($product->discount_price == NULL)
                                            <div class="tag new"><span>new</span></div>
                                            @else
                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                @if(session()->get('locale') == 'ar')
                                                {{ $product->product_name_ar }} @else {{ $product->product_name_en }}
                                                @endif
                                            </a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        @if ($product->discount_price == NULL)
                                        <div class="product-price"> <span class="price"> ${{ $product->selling_price }}
                                            </span> </div>
                                        @else
                                        <div class="product-price"> <span class="price"> ${{ $product->discount_price }}
                                            </span> <span class="price-before-discount">$
                                                {{ $product->selling_price }}</span> </div>
                                        @endif


                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">

                                                    <button class="btn btn-primary icon" type="button" title="Add Cart"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        id="{{ $product->id }}" onclick="productView(this.id)"> <i
                                                            class="fa fa-shopping-cart"></i> </button>

                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>



                                                <button class="btn btn-primary icon" type="button" title="Wishlist"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i
                                                        class="fa fa-heart"></i> </button>



                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- == ==== FEATURED PRODUCTS : END ==== === -->





                <!-- == === skip_product_0 PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('locale') == 'ar') {{ $skip_category_0->category_name_ar }} @else
                        {{ $skip_category_0->category_name_en }} @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                        @foreach($skip_product_0 as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img
                                                    src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                                        <!-- /.image -->

                                        @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount/$product->selling_price) * 100;
                                        @endphp

                                        <div>
                                            @if ($product->discount_price == NULL)
                                            <div class="tag new"><span>new</span></div>
                                            @else
                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                @if(session()->get('locale') == 'ar')
                                                {{ $product->product_name_ar }} @else {{ $product->product_name_en }}
                                                @endif
                                            </a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        @if ($product->discount_price == NULL)
                                        <div class="product-price"> <span class="price"> ${{ $product->selling_price }}
                                            </span> </div>
                                        @else
                                        <div class="product-price"> <span class="price"> ${{ $product->discount_price }}
                                            </span> <span class="price-before-discount">$
                                                {{ $product->selling_price }}</span> </div>
                                        @endif


                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">


                                                    <button class="btn btn-primary icon" type="button" title="Add Cart"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        id="{{ $product->id }}" onclick="productView(this.id)"> <i
                                                            class="fa fa-shopping-cart"></i> </button>

                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>



                                                <button class="btn btn-primary icon" type="button" title="Wishlist"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i
                                                        class="fa fa-heart"></i> </button>


                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- == ==== skip_product_0 PRODUCTS : END ==== === -->








                <!-- == === skip_product_1 PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('locale') == 'ar') {{ $skip_category_1->category_name_ar }} @else
                        {{ $skip_category_1->category_name_en }} @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                        @foreach($skip_product_1 as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img
                                                    src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                                        <!-- /.image -->

                                        @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount/$product->selling_price) * 100;
                                        @endphp

                                        <div>
                                            @if ($product->discount_price == NULL)
                                            <div class="tag new"><span>new</span></div>
                                            @else
                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                @if(session()->get('locale') == 'ar')
                                                {{ $product->product_name_ar }} @else {{ $product->product_name_en }}
                                                @endif
                                            </a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        @if ($product->discount_price == NULL)
                                        <div class="product-price"> <span class="price"> ${{ $product->selling_price }}
                                            </span> </div>
                                        @else
                                        <div class="product-price"> <span class="price"> ${{ $product->discount_price }}
                                            </span> <span class="price-before-discount">$
                                                {{ $product->selling_price }}</span> </div>
                                        @endif


                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">


                                                    <button class="btn btn-primary icon" type="button" title="Add Cart"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        id="{{ $product->id }}" onclick="productView(this.id)"> <i
                                                            class="fa fa-shopping-cart"></i> </button>

                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>



                                                <button class="btn btn-primary icon" type="button" title="Wishlist"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i
                                                        class="fa fa-heart"></i> </button>


                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- == ==== skip_product_1 PRODUCTS : END ==== === -->















                <!-- ============================================== WIDE PRODUCTS ============================================== -->

                <!-- /.wide-banners -->
                <!-- == ===== WIDE PRODUCTS : END ====== ====== -->






                <!-- == === skip_brand_product_1 PRODUCTS == ==== -->


                <!-- /.section -->
                <!-- == ==== skip_brand_product_1 PRODUCTS : END ==== === -->













                <!-- ============================================== BEST SELLER ============================================== -->


                <!-- /.sidebar-widget -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->


@endsection