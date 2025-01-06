@extends('layouts.app')

@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Detail service</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pr-40 order-1 order-lg-2">
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="list-view" class="tab-pane fade product-list-view active show" role="tabpanel">
                                <div class="row list-service">
                                    <div class="row li-main-content">
                                        <div class="col-lg-12">
                                            <div class="li-blog-single-item pb-30">
                                                <div class="li-blog-banner">
                                                    <a href="blog-details.html"><img class="img-full"
                                                            src="{{ asset('storage/' . $service->image) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="li-blog-content">
                                                    <div class="li-blog-details">
                                                        <h3 class="li-blog-heading pt-25"><a
                                                                href="#">{{ $service->name }}</a>
                                                        </h3>
                                                        <div class="li-blog-meta">
                                                            {{-- <a class="comment" href="#"><i
                                                                class="fa fa-comment-o"></i>{{ $post->comments->count() }}
                                                            comment</a>
                                                        <a class="post-time" href="#"><i
                                                                class="fa fa-calendar"></i>{{ $post->created_at }}</a> --}}
                                                        </div>
                                                        {{-- <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere
                                        libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p> --}}
                                                        <div class="li-blog-blockquote">
                                                            <blockquote>
                                                                <p>
                                                                    {{ $service->description }} <br>
                                                                    <span style="font-size: 18px">
                                                                        <span style="color: rgb(47, 168, 209)">Open from
                                                                        </span>7:30am
                                                                        <span style="color: rgb(47, 168, 209)">to
                                                                        </span>10:00pm
                                                                    </span> <br>
                                                                    Coffee and foods
                                                                </p>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Begin Li's Blog Comment Section -->

                                            <div class="tab-content">
                                                <div class="product-active owl-carousel">
                                                    {{-- @foreach ($apartments as $apartmentB) --}}
                                                    <div class="col-lg-12">
                                                        <!-- single-product-wrap start -->
                                                        <div class="single-product-wrap laptop_relative">
                                                            <div class="product-image">
                                                                <a href="">
                                                                    {{-- <img src="{{ asset('storage/' . $apartmentB->image) }}"
                                                                            alt="Li's Product Image"> --}}
                                                                </a>
                                                                <span class="sticker">New</span>
                                                            </div>
                                                            <div class="product_desc">
                                                                <div class="product_desc_info">
                                                                    <div class="product-review">
                                                                        <h5 class="manufacturer">
                                                                            {{-- type --}}
                                                                        </h5>
                                                                        <div class="rating-box">
                                                                            <ul class="rating">
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li class="no-star"><i
                                                                                        class="fa fa-star-o"></i></li>
                                                                                <li class="no-star"><i
                                                                                        class="fa fa-star-o"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h4><a class="product_name" href="">Sicula</a>
                                                                    </h4>
                                                                    <div class="price-box">
                                                                        <span class="new-price"
                                                                            style="color: rgb(22, 169, 105)">Price for
                                                                            sale</span><span class="new-price">$30</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- single-product-wrap end -->
                                                    </div>
                                                    {{-- @endforeach --}}
                                                </div>
                                            </div>

                                            <div class="li-comment-section">
                                                {{-- <h3>{{ $post->comments->count() }} comment</h3> --}}
                                                <ul>
                                                    {{-- @foreach ($post->comments as $comment)
                                                    <li>
                                                        <div class="author-avatar pt-15">
                                                            <img src="{{ asset('storage/' . $comment->resident->user->img) }}"
                                                                alt="User" width="40px" height="60px"
                                                                style="border-radius: 100%">
                                                        </div>
                                                        <div class="comment-body pl-15">
                                                            <span class="reply-btn pt-15 pt-xs-5"><a href="javascript:void(0)"
                                                                    class="reply-link"
                                                                    data-comment-id="{{ $comment->id }}">reply</a></span>
                                                            <h5 class="comment-author pt-15">{{ $comment->resident->user->name }}
                                                            </h5>
                                                            <div class="comment-post-date">
                                                                {{ $comment->created_at }}
                                                            </div>
                                                            <p>{{ $comment->content }}</p>
                                                        </div>
        
                                                        <div class="reply-form ml-10" id="reply-form-{{ $comment->id }}"
                                                            style="display: none; margin-top: 10px;">
                                                            <form action="{{ route('comments.reply', $comment->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <textarea name="content" rows="2" class="form-control" placeholder="Write your reply here..."></textarea>
                                                                <button type="submit" class="send-btn btn-sm mt-2">Send</button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                    @foreach ($comment->replies as $reply)
                                                        <li class="comment-children">
                                                            <div class="author-avatar pt-15">
                                                                <img src="{{ asset('storage/' . $reply->resident->user->img) }}"
                                                                    alt="User" width="40px" height="60px"
                                                                    style="border-radius: 100%">
                                                            </div>
                                                            <div class="comment-body pl-15">
                                                                <span class="reply-btn pt-15 pt-xs-5"><a href="javascript:void(0)"
                                                                        class="reply-link"
                                                                        data-comment-id="{{ $reply->id }}">reply</a></span>
                                                                <h5 class="comment-author pt-15">
                                                                    {{ $reply->resident->user->name }}</h5>
                                                                <div class="comment-post-date">
                                                                    {{ $reply->created_at }}
                                                                </div>
                                                                <p>{{ $reply->content }}</p>
                                                            </div>
        
                                                            <div class="reply-form ml-10" id="reply-form-{{ $reply->id }}"
                                                                style="display: none; margin-top: 10px;">
                                                                <form action="{{ route('comments.reply', $comment->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <textarea name="content" rows="2" class="form-control" placeholder="Write your reply here..."></textarea>
                                                                    <button type="submit"
                                                                        class="send-btn btn-sm mt-2">Send</button>
                                                                </form>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endforeach --}}
                                                </ul>
                                            </div>
                                            <!-- Li's Blog Comment Section End Here -->
                                            <!-- Begin Blog comment Box Area -->
                                            {{-- <div class="li-blog-comment-wrapper">
                                            <h3>leave a reply</h3>
                                            <p>Your email address will not be published. Required fields are marked *</p>
                                            <form action="{{ url('/community/post/' . $post->id . '/comment') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="comment-post-box">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label>comment</label>
                                                            <textarea name="content" id="content" placeholder="Write a comment"></textarea>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="coment-btn pt-30 pb-sm-30 pb-xs-30 f-left">
                                                                <input class="li-btn-2" type="submit" name="submit"
                                                                    value="post comment">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> --}}
                                            <!-- Blog comment Box Area End Here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                        <div class="sidebar-title">
                            <h2>Laptop</h2>
                        </div>
                        <!-- category-sub-menu start -->
                        <div class="category-sub-menu">
                            <ul>
                                <li class="has-sub"><a href="# ">Prime Video</a>
                                    <ul>
                                        <li><a href="#">All Videos</a></li>
                                        <li><a href="#">Blouses</a></li>
                                        <li><a href="#">Evening Dresses</a></li>
                                        <li><a href="#">Summer Dresses</a></li>
                                        <li><a href="#">T-Rent or Buy</a></li>
                                        <li><a href="#">Your Watchlist</a></li>
                                        <li><a href="#">Watch Anywhere</a></li>
                                        <li><a href="#">Getting Started</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="#">Computer</a>
                                    <ul>
                                        <li><a href="#">TV & Video</a></li>
                                        <li><a href="#">Audio & Theater</a></li>
                                        <li><a href="#">Camera, Photo</a></li>
                                        <li><a href="#">Cell Phones</a></li>
                                        <li><a href="#">Headphones</a></li>
                                        <li><a href="#">Video Games</a></li>
                                        <li><a href="#">Wireless Speakers</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="#">Electronics</a>
                                    <ul>
                                        <li><a href="#">Amazon Home</a></li>
                                        <li><a href="#">Kitchen & Dining</a></li>
                                        <li><a href="#">Bed & Bath</a></li>
                                        <li><a href="#">Appliances</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- category-sub-menu end -->
                    </div>
                    <!--sidebar-categores-box end  -->
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Filter By</h2>
                        </div>
                        <!-- btn-clear-all start -->
                        <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                        <!-- btn-clear-all end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Brand</h5>
                            <div class="categori-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" name="product-categori"><a href="#">Prime Video
                                                (13)</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">Computers
                                                (12)</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">Electronics
                                                (11)</a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Categories</h5>
                            <div class="categori-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" name="product-categori"><a href="#">Graphic
                                                Corner (10)</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#"> Studio
                                                Design (6)</a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Size</h5>
                            <div class="size-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" name="product-size"><a href="#">S (3)</a></li>
                                        <li><input type="checkbox" name="product-size"><a href="#">M (3)</a></li>
                                        <li><input type="checkbox" name="product-size"><a href="#">L (3)</a></li>
                                        <li><input type="checkbox" name="product-size"><a href="#">XL (3)</a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Color</h5>
                            <div class="color-categoriy">
                                <form action="#">
                                    <ul>
                                        <li><span class="white"></span><a href="#">White (1)</a></li>
                                        <li><span class="black"></span><a href="#">Black (1)</a></li>
                                        <li><span class="Orange"></span><a href="#">Orange (3) </a></li>
                                        <li><span class="Blue"></span><a href="#">Blue (2) </a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                            <h5 class="filter-sub-titel">Dimension</h5>
                            <div class="categori-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" name="product-categori"><a href="#">40x60cm
                                                (6)</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">60x90cm
                                                (6)</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">80x120cm
                                                (6)</a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                    </div>
                    <!--sidebar-categores-box end  -->
                    <!-- category-sub-menu start -->
                    <div class="sidebar-categores-box mb-sm-0">
                        <div class="sidebar-title">
                            <h2>Laptop</h2>
                        </div>
                        <div class="category-tags">
                            <ul>
                                <li><a href="# ">Devita</a></li>
                                <li><a href="# ">Cameras</a></li>
                                <li><a href="# ">Sony</a></li>
                                <li><a href="# ">Computer</a></li>
                                <li><a href="# ">Big Sale</a></li>
                                <li><a href="# ">Accessories</a></li>
                            </ul>
                        </div>
                        <!-- category-sub-menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wraper Area End Here --> 
@endsection
