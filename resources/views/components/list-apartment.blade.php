<<<<<<< HEAD:resources/views/components/list-apartment.blade.php
@vite(['resources/css/product.css'])
=======
@php
    use Carbon\Carbon;
@endphp
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/components/list-product.blade.php
<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
<<<<<<< HEAD:resources/views/components/list-apartment.blade.php
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>{{ __('messages.some_apartment') }}</span></a></li>
                        <li><a data-toggle="tab" href="#li-bestseller-product"><span>{{ __('messages.best_offer') }}</span></a></li>
=======
                        <li><a id="new_arrival-tab" class="active" data-toggle="tab" style="cursor: pointer"
                                onclick="toggleTabLaptop()"><span>{{ __('messages.newarrival') }}</span></a></li>
                        <li><a id="best_seller-tab" data-toggle="tab" style="cursor: pointer"
                                onclick="toggleTabLaptop()"><span>{{ __('messages.bestseller') }}</span></a></li>
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/components/list-product.blade.php
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
<<<<<<< HEAD:resources/views/components/list-apartment.blade.php
                        @foreach ($apartments as $apartment)
=======
                        @foreach ($newLaptops as $laptop)
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/components/list-product.blade.php
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ url('apartment/' . $apartment->id) }}"
                                            style="height: 180px !important; display: flex; align-items: center">
                                            <img src="{{ asset('storage/' . $apartment->image) }}" alt="Current Image"
                                                style="height: 180px !important; margin: 0 auto; margin-top: 10px;">
                                        </a>
<<<<<<< HEAD:resources/views/components/list-apartment.blade.php
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review" style="display: flex">
                                                <div class="col-6" style="padding-left: 0">
                                                    @if ($apartment->type === 1)
                                                        <h5 class="manufacturer">VIP</h5>
                                                    @elseif ($apartment->type === 2)
                                                        <h5 class="manufacturer">Casual</h5>
                                                    @else
                                                    <h5 class="manufacturer">Studio</h5>
                                                    @endif
                                                </div>
                                                <div class="col-8 d-flex" style="text-align: end; padding-left: 0">
                                                    <i class="fa fa-bed mr-2" aria-hidden="true">
                                                        {{ $apartment->bed }}</i>
                                                    <i class="fa fa-bath" aria-hidden="true"> {{ $apartment->bath }}</i>
                                                </div>
                                            </div>
                                            <h4>
                                                <a class="product_name"
                                                    href="{{ url('apartment/' . $apartment->id) }}">{{ $apartment->apartment_number }}</a>
=======
                                        @if (\Carbon\Carbon::parse($laptop->created_at)->gt(\Carbon\Carbon::now()->subWeeks(2)))
                                            <span class="sticker">New</span>
                                        @endif
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a
                                                        href="{{ route('search-filter', ['search' => $laptop->brand->name]) }}">{{ $laptop->brand->name ?? 'No Brand' }}</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        @if ($laptop->rating >= 1)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 0 && $laptop->rating < 1)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif

                                                        @if ($laptop->rating >= 2)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 1 && $laptop->rating < 2)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif

                                                        @if ($laptop->rating >= 3)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 2 && $laptop->rating < 3)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif

                                                        @if ($laptop->rating >= 4)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 3 && $laptop->rating < 4)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif

                                                        @if ($laptop->rating == 5)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 4 && $laptop->rating < 5)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                    href="{{url('laptop/' .$laptop->id)}}">{{ $laptop->name }}</a>
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/components/list-product.blade.php
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price" style="color: rgb(255, 77, 0)">Price per
                                                    month</span><span
                                                    class="new-price">${{ $apartment->price_per_month }}</span>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price" style="color: rgb(22, 169, 105)">Price for
                                                    sale</span><span
                                                    class="new-price">${{ $apartment->price_sale }}</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
<<<<<<< HEAD:resources/views/components/list-apartment.blade.php
                                            @auth
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a
                                                            href="{{ url('apartment/' . $apartment->id . '/buy') }}">Buy</a>
                                                    </li>
                                                    <li><a class="links-details"
                                                            href="{{ url('wishlist/' . $apartment->id . '/add') }}"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="{{ url('apartment/' . $apartment->id . '/rent') }}" title="rent" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-money"></i></a></li>
                                                </ul>
                                            @else
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a onclick="showLoginAlert()"
                                                            >Buy</a>
                                                    </li>
                                                    <li><a class="links-details" onclick="showLoginAlert()"
                                                            ><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a title="rent" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-money"></i></a></li>
                                                </ul>
                                            @endauth
=======
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a
                                                        href="{{ url('cart/' . $laptop->id . '/addSingle') }}">Add to
                                                        cart</a></li>
                                                <li><a class="links-details"
                                                        href="{{ url('wishlist/' . $laptop->id . '/add') }}"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#exampleModalCenter"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/components/list-product.blade.php
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
<<<<<<< HEAD:resources/views/components/list-apartment.blade.php
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/7.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            {{-- <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="rent" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                    </div>
                </div>
            </div>
            <div id="li-featured-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/3.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            {{-- <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium
                                                dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="rent" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/5.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            {{-- <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/7.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            {{-- <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium
                                                dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/9.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            {{-- <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/11.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            {{-- <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium
                                                dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/12.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
=======
                        @foreach ($bestSellerLaptops as $laptop)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ url('laptop/' . $laptop->id) }}"
                                            style="height: 180px !important; display: flex; align-items: center">
                                            <img src="{{ asset('storage/' . $laptop->img) }}" alt="Current Image"
                                                style="height: auto; margin: 0 auto; margin-top: 10px;">
                                        </a>
                                        @if (\Carbon\Carbon::parse($laptop->created_at)->gt(\Carbon\Carbon::now()->subWeeks(2)))
                                            <span class="sticker">New</span>
                                        @endif
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a
                                                        href="shop-left-sidebar.html">{{ $laptop->brand->name ?? 'No Brand' }}</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        @if ($laptop->rating >= 1)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 0 && $laptop->rating < 1)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif

                                                        @if ($laptop->rating >= 2)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 1 && $laptop->rating < 2)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif

                                                        @if ($laptop->rating >= 3)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 2 && $laptop->rating < 3)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif

                                                        @if ($laptop->rating >= 4)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 3 && $laptop->rating < 4)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif

                                                        @if ($laptop->rating == 5)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @elseif ($laptop->rating >= 4 && $laptop->rating < 5)
                                                            <li><i class="fa fa-star-half-o"></i></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                    href="{{('laptop/' .$laptop->id)}}">{{ $laptop->name }}</a>
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price">${{ $laptop->price }}</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a
                                                        href="{{ url('cart/' . $laptop->id . '/addSingle') }}">Add to
                                                        cart</a></li>
                                                <li><a class="links-details"
                                                        href="{{ url('wishlist/' . $laptop->id . '/add') }}"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#exampleModalCenter"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/components/list-product.blade.php
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->

@if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('status') === 'added')
                Swal.fire({
                    icon: 'success',
                    title: 'Added!',
                    text: 'Apartment has been added to your wishlist.',
                    timer: 2000,
                    showConfirmButton: false
                });
            @elseif (session('status') === 'existed')
                Swal.fire({
                    icon: 'info',
                    title: 'Already Exists!',
                    text: 'Apartment is already in your wishlist.',
                    timer: 2000,
                    showConfirmButton: false
                });
            @elseif (session('status') === 'addedCart')
                Swal.fire({
                    icon: 'success',
                    title: 'Added!',
                    text: 'Apartment has been added to your cart.',
                    timer: 2000,
                    showConfirmButton: false
                });
            @elseif (session('status') === 'plused')
                Swal.fire({
                    icon: 'success',
                    title: 'Plus!',
                    text: 'Apartment has been plused to your Apartment quantity.',
                    timer: 2000,
                    showConfirmButton: false
                });
            @elseif (session('status') === 'Out stock')
                Swal.fire({
                    icon: 'warning',
                    title: 'Out of stock!',
                    timer: 2000,
                    showConfirmButton: false
                });
            @endif
        });
    </script>
@endif

<script>
    $(".product-active").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        item: 5,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });
    // Li's Product Activision
    $(".special-product-active").owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-left"></i>'],
        item: 4,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

<<<<<<< HEAD:resources/views/components/list-apartment.blade.php
    function showLoginAlert() {
        Swal.fire({
            icon: 'warning',
            title: 'You have to login',
            text: 'Please login!',
            confirmButtonText: 'Login',
            showCancelButton: true,
            cancelButtonText: 'Later',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('login-page') }}";
            }
        });
=======
    // Toggle tab laptops
    function toggleTabLaptop() {
        $("#li-new-product").toggleClass("active show");
        $("#li-bestseller-product").toggleClass("active show");

        $("#new_arrival-tab").toggleClass("active");
        $("#best_seller-tab").toggleClass("active");
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/components/list-product.blade.php
    }
</script>
