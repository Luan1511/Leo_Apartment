@extends('layouts.app')

@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Service</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Begin Li's Banner Area -->
                    <div class="single-banner shop-page-banner">
                        <a href="#">
                            <img src="{{asset('storage/images/banners/pool_2.jpg')}}" alt="Li's Static Banner" height="170px">
                        </a>
                    </div>
                    <!-- Li's Banner Area End Here -->
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-30">
                        <div class="shop-bar-inner">
                            <div class="toolbar-amount">
                                <span>Showing 1 to 9 of 15</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sort By:</p>
                                <select class="nice-select">
                                    <option value="trending">Relevance</option>
                                    <option value="sales">Name (A - Z)</option>
                                    <option value="sales">Name (Z - A)</option>
                                    <option value="rating">Price (Low &gt; High)</option>
                                    <option value="date">Rating (Lowest)</option>
                                    <option value="price-asc">Model (A - Z)</option>
                                    <option value="price-asc">Model (Z - A)</option>
                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="list-view" class="tab-pane fade product-list-view active show" role="tabpanel">
                                <div class="row list-service">
                                    @include('components.services_render')
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Filter By</h2>
                        </div>
                        <!-- btn-clear-all start -->
                        <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                        <!-- btn-clear-all end -->

                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                            <h5 class="filter-sub-titel">Price</h5>
                            <div class="categori-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" name="product-categori"><a href="#">increasing</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">decreasing</a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->

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
                    </div>
                    <!--sidebar-categores-box end  -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wraper Area End Here -->
@endsection
