@extends('layouts.app')

@section('content')
    <style>
        .fa-bed,
        .fa-bath {
            color: #0363cd !important;
            background-color: rgb(231, 231, 231);
            height: fit-content;
            padding: 2px 5px;
            border-radius: 3px;
            border: solid 1px rgb(189, 189, 189);
        }
    </style>

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home-page') }}">Home</a></li>
                    <li class="active">Single apartment</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->

    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            @foreach ($apartment_images as $image)
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="{{ asset('storage/' . $image->image) }}"
                                        data-gall="myGallery">
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="product image"
                                            style="height: 280px">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            @foreach ($apartment_images as $image)
                                <div class="sm-image"><img src="{{ asset('storage/' . $image->image) }}"
                                        alt="product image thumb" style="height: 100px">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            {{-- <h2>{{ $laptop->name }}</h2> --}}
                            <span class="product-details-ref"
                                style="font-size: 20px; font-weight: 500; color: #0363cd">{{ $apartment->apartment_number }}</span>
                            <div class="rating-box pt-20">
                                {{-- <ul class="rating rating-with-review-item">
                                    @if ($apartment->rating >= 1)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($apartment->rating >= 0 && $apartment->rating < 1)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif

                                    @if ($apartment->rating >= 2)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($apartment->rating >= 1 && $apartment->rating < 2)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif

                                    @if ($apartment->rating >= 3)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($apartment->rating >= 2 && $apartment->rating < 3)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif

                                    @if ($apartment->rating >= 4)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($apartment->rating >= 3 && $apartment->rating < 4)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif

                                    @if ($apartment->rating == 5)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($apartment->rating >= 4 && $apartment->rating < 5)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif
                                </ul> --}}
                            </div>
                            <div class="interior-container col-8 d-flex mt-20"
                                style="text-align: end; padding-left: 0; font-size: 20px">
                                <i class="fa fa-bed mr-20" aria-hidden="true">
                                    {{ $apartment->bed }}</i>
                                <i class="fa fa-bath" aria-hidden="true"> {{ $apartment->bath }}</i>
                            </div>
                            <div class="price-box pt-20">
                                <div class="new-price new-price-2 mb-5"><span
                                        style="color: rgb(72, 72, 72); font-size: 17px">Price per month:</span>
                                    ${{ $apartment->price_per_month }}</div>
                                <div class="new-price new-price-2" style="color: rgb(255, 187, 0)"><span
                                        style="color: rgb(72, 72, 72); font-size: 17px">Price sale:</span>
                                    ${{ $apartment->price_sale }}</div>
                            </div>
                            <div class="product-desc">
                                <p>
                                    <span>
                                        {{-- {{ $laptop->description }} --}}
                                    </span>
                                </p>
                            </div>
                            <div class="single-add-to-cart">
                                <form action="#" class="cart-quantity">
                                    <a class="add-to-cart" href="{{ url('apartment/' . $apartment->id . '/buy') }}">Buy</a>
                                </form>
                            </div>
                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn wishlist-detail"
                                    href="{{ url('wishlist/' . $apartment->id . '/add') }}"><i
                                        class="fa fa-heart-o"></i>Add to wishlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#product-details"><span>Apartment
                                        Details</span></a>
                            {{-- <li><a class="" data-toggle="tab" href="#product-details"><span>Review</span></a> --}}
                            </li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="row mt-40">
                <!-- Begin Li's Shipping Inner Box Area -->
                <div class="col-lg-4 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                    <div class="li-shipping-inner-box">
                        <div class="shipping-icon">
                            <i class="fa-solid fa-wifi" style="font-size: 40px; color:gray"></i>
                        </div>
                        <div class="shipping-text" style="padding-top: 0">
                            <h2>Free Wifi</h2>
                        </div>
                    </div>
                </div>
                <!-- Li's Shipping Inner Box Area End Here -->
                <!-- Begin Li's Shipping Inner Box Area -->
                <div class="col-lg-4 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                    <div class="li-shipping-inner-box">
                        <div class="shipping-icon">
                            <i class="fa-solid fa-piggy-bank" style="font-size: 40px; color:gray"></i>
                        </div>
                        <div class="shipping-text" style="padding-top: 0">
                            <h2>Save money</h2>
                        </div>
                    </div>
                </div>
                <!-- Li's Shipping Inner Box Area End Here -->
                <!-- Begin Li's Shipping Inner Box Area -->
                <div class="col-lg-4 col-md-6 col-sm-6 pb-xs-30">
                    <div class="li-shipping-inner-box">
                        <div class="shipping-icon">
                            <i class="fa-solid fa-shield-halved" style="font-size: 40px; color:gray"></i>
                        </div>
                        <div class="shipping-text" style="padding-top: 0">
                            <h2>Safe</h2>
                        </div>
                    </div>
                </div>
                <!-- Li's Shipping Inner Box Area End Here -->
            </div>
            <div class="tab-content">
                <div id="detail-laptop" class="tab-pane active show" role="tabpanel">
                    <div class="product-description" style="overflow: auto">
                        <table class="detail-laptop-table cart-table text-center" style="width: 100%">
                            <tbody>
                                <tr>
                                    <th>Description</th>
                                </tr>
                                <tr>
                                    @if ($apartment->description != null)
                                        <td> {{ $apartment->description }} </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="review-apartment" class="tab-pane" role="tabpanel">
                    @php
                        $ratingCount = [];
                        for ($i = 1; $i <= 5; $i++) {
                            $ratingCount[$i] = $apartment->comment()->where('rating', $i)->count();
                        }
                    @endphp
                    <div class="component_rating" style="margin-bottom: 20px">
                        <div class="componet_rating_content"
                            style="display: flex;align-items: center;border-radius: 5px;border:1px solid #dedede ">
                            <div class="rating_item" style="width: 20%; position: relative;">
                                <span class="fa fa-star"
                                    style="font-size: 100px;display: block;color: #ff9705; margin: 0 auto; text-align: center;">
                                </span><b
                                    style="position: absolute; top: 40%; left: 45%; transform: translateX(-50) translateY(-50);color: white; font-size: 20px">{{ $apartment->rating }}</b>
                            </div>
                            <input type="hidden" id="rating-val">
                            <div class="list_rating" style="width: 60%; padding: 20px">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php
                                        if ($apartment->comment()->count() != 0) {
                                            $percent = ($ratingCount[$i] * 100) / $apartment->comment()->count();
                                        } else {
                                            $percent = 0;
                                        }
                                    @endphp
                                    <div class="item_rating" style="display: flex; align-items: center">

                                        <div style="width: 10%; font-size: 14px ">
                                            {{ $i }}<span class="fa fa-star"></span>
                                        </div>
                                        <div style="width: 70%; margin: 0 20px">
                                            <span
                                                style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius:5px; background-color: #dedede ">
                                                <b
                                                    style="width: {{ $percent }}%; background-color:#f25800; display: block;border-radius:5px; height: 100%;"></b>
                                            </span>
                                        </div style="width: 20%">
                                        <div>
                                            <a href="">{{ $ratingCount[$i] }} comments</a>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <div style="width: 20%">
                                {{-- @if (Auth::user()->comment()->where('apartment_id', $apartment->id)->count() < 1 &&
                                        Auth::user()->license()->where('apartment_id', $apartment->id)->count() === 1) --}}
                                    <a href="#" class="js_rating_action"
                                        style="width: 200px; background: #288ad6;padding: 10px;color: white; border-radius: 5px">Create
                                        your
                                        review</a>
                                {{-- @elseif (Auth::user()->comment()->where('apartment_id', $apartment->id)->count() > 0)
                                    <a href="#" class="js_rating_action"
                                        style="width: 200px; background: #288ad6;padding: 10px;color: white; border-radius: 5px; opacity: 70% !important; pointer-events: none !important; cursor: not-allowed;">You
                                        already commented</a>
                                @elseif (Auth::user()->license()->where('apartment_id', $apartment->id)->count() < 1)
                                    <a href="#" class="js_rating_action"
                                        style="width: 200px; background: #288ad6;padding: 10px;color: white; border-radius: 5px; opacity: 70% !important; pointer-events: none !important; cursor: not-allowed;">You
                                        have to buy first</a>
                                @endif --}}
                            </div>
                        </div>
                        <?php
                        $listRatingText = [
                            1 => 'Very Bad',
                            2 => 'Bad',
                            3 => 'Okay',
                            4 => 'Good',
                            5 => 'Excellent',
                        ];
                        ?>

                        <div class="form_rating hide">
                            <div style="display: flex; margin-top: 15px; font-size: 15px">
                                <p style="margin-bottom:0 ">Choose your review</p>
                                <span style="margin: 0 15px" class="list_start">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star" data-key="{{ $i }}"></i>
                                    @endfor
                                </span>
                                <span class="list_text"></span>
                            </div>
                            <div style="margin-top: 15px">
                                <textarea name="" class="form-control" id="content-review" cols="30" rows="3"></textarea>
                            </div>

                            <div style="margin-top: 15px">
                                <a class="js_rating_product"
                                    style="width: 200px; background: #288ad6;padding: 10px ;color: white; border-radius: 5px;">Submit
                                    your
                                    review</a>
                            </div>
                        </div>

                        <div class="list-review">
                            {{-- @include('components.render-comment-laptop') --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    <!-- Begin Li's Laptop Product Area -->
    <section class="product-area li-laptop-product pt-30 pb-50">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Other apartment in the same type:</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach ($apartments as $apartmentB)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap laptop_relative">
                                        <div class="product-image">
                                            <a href="{{ url('apartment/' . $apartment->id) }}">
                                                <img src="{{ asset('storage/' . $apartmentB->image) }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        @if ($apartment->type === 1)
                                                            <h5 class="manufacturer">VIP</h5>
                                                        @elseif ($apartment->type === 2)
                                                            <h5 class="manufacturer">Casual</h5>
                                                        @else
                                                            <h5 class="manufacturer">Studio</h5>
                                                        @endif
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
                                                <h4><a class="product_name"
                                                        href="{{ url('apartment/' . $apartment->id) }}">{{ $apartmentB->apartment_number }}</a>
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
                                                @auth
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a
                                                                href="{{ url('apartment/' . $apartment->id . '/buy') }}">Buy</a>
                                                        </li>
                                                        <li><a class="links-details"
                                                                href="{{ url('wishlist/' . $apartment->id . '/add') }}"><i
                                                                    class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{ url('apartment/' . $apartment->id . '/rent') }}"
                                                                title="rent" class="quick-view-btn" data-toggle="modal"
                                                                data-target="#exampleModalCenter"><i
                                                                    class="fa fa-money"></i></a></li>
                                                    </ul>
                                                @else
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a
                                                                href="{{ url('apartment/' . $apartment->id . '/buy') }}">Buy</a>
                                                        </li>
                                                        <li><a class="links-details" onclick="showLoginAlert()"><i
                                                                    class="fa fa-heart-o"></i></a></li>
                                                        <li><a title="rent" class="quick-view-btn" data-toggle="modal"
                                                                data-target="#exampleModalCenter"><i
                                                                    class="fa fa-money"></i></a></li>
                                                    </ul>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Laptop Product Area End Here -->

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('status') === 'added')
                    Swal.fire({
                        icon: 'success',
                        title: 'Added!',
                        text: 'Laptop has been added to your wishlist.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'existed')
                    Swal.fire({
                        icon: 'info',
                        title: 'Already Exists!',
                        text: 'Laptop is already in your wishlist.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'addedCart')
                    Swal.fire({
                        icon: 'success',
                        title: 'Added!',
                        text: 'Laptop has been added to your cart.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'plused')
                    Swal.fire({
                        icon: 'success',
                        title: 'Plus!',
                        text: 'Laptop has been plused to your Laptop quantity.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @endif
            });
        </script>
    @endif

    <script>
        $('.product-details-images').each(function() {
            var $this = $(this);
            var $thumb = $this.siblings('.product-details-thumbs, .tab-style-left');
            $this.slick({
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 5000,
                dots: false,
                infinite: true,
                centerMode: false,
                centerPadding: 0,
                asNavFor: $thumb,
            });
        });
        $('.product-details-thumbs').each(function() {
            var $this = $(this);
            var $details = $this.siblings('.product-details-images');
            $this.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 5000,
                dots: false,
                infinite: true,
                focusOnSelect: true,
                centerMode: true,
                centerPadding: 0,
                prevArrow: '<span class="slick-prev"><i class="fa fa-angle-left"></i></span>',
                nextArrow: '<span class="slick-next"><i class="fa fa-angle-right"></i></span>',
                asNavFor: $details,
            });
        });
        $('.tab-style-left, .tab-style-right').each(function() {
            var $this = $(this);
            var $details = $this.siblings('.product-details-images');
            $this.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 5000,
                dots: false,
                infinite: true,
                focusOnSelect: true,
                vertical: true,
                centerPadding: 0,
                prevArrow: '<span class="slick-prev"><i class="fa fa-angle-down"></i></span>',
                nextArrow: '<span class="slick-next"><i class="fa fa-angle-up"></i></span>',
                asNavFor: $details,
            });
        });

        // cart
        $(".cart-plus-minus").append(
            '<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>'
        );
        $(".qtybutton").on("click", function() {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.parent().find("input").val(newVal);
        });

        // Add to cart
        function buyApartment() {
            // var $laptopId = {{ $apartment->id }};
            // var $quantity = $(".cart-plus-minus-box").val();
            // window.location.href = "{{ url('cart/add') }}/" + $laptopId + "/" + parseInt($quantity);
        }
    </script>
@endsection
