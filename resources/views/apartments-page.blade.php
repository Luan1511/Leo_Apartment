@extends('layouts.app')

@section('content')
    @vite(['resources/css/product.css'])
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Apartments</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->

    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60 pt-sm-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Begin Li's Banner Area -->
                    <div class="single-banner shop-page-banner">
                        <a href="#">
                            <img src="{{ asset('images/backgrounds/background_1.jpg') }}" height="250px"
                                alt="Li's Static Banner" style="border: solid 1px rgb(175, 175, 175)">
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
                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row" id="apartment-list">
                                        @include('components.apartment-render')
                                    </div>
                                </div>
                            </div>
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 pt-xs-15">
                                        <p>Showing 1-12 of 13 item(s)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box pt-xs-20 pb-xs-15">
                                            <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i>
                                                    Previous</a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                                <a href="#" class="Next"> Next <i
                                                        class="fa fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
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
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Area</h5>
                            <div class="categori-checkbox">
                                <form action="#" class="search-form">
                                    <ul>
                                        <li><input type="checkbox" name="apartment-area" value="80">80</li>
                                        <li><input type="checkbox" name="apartment-area" value="100">100</li>
                                        <li><input type="checkbox" name="apartment-area" value="200">200</li>
                                        <li><input type="checkbox" name="apartment-area" value="240">240</li>
                                        <li><input type="checkbox" name="apartment-area" value="300">300</li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Price</h5>
                            <div class="categori-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" name="price-decrea"><a href="#">Decreasing</a>
                                        </li>
                                        <li><input type="checkbox" name="price-increa"><a href="#">Increasing</a>
                                        </li>
                                        <li style="display: flex; align-items: center">
                                            $<input type="text" class="min-value-price"
                                                style="width: 75px !important; background-color: white; border-radius: 3px"
                                                value="0">
                                            to $<input type="text" class="max-value-price"
                                                style="width: 75px !important; background-color: white; border-radius: 3px"
                                                value="100000">
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Floor</h5>
                            <div class="categori-checkbox">
                                <form action="#" class="search-form">
                                    <ul>
                                        <li><input type="checkbox" name="floor" value="1">1</li>
                                        <li><input type="checkbox" name="floor" value="2">2</li>
                                        <li><input type="checkbox" name="floor" value="3">3</li>
                                        <li><input type="checkbox" name="floor" value="4">4</li>
                                        <li><input type="checkbox" name="floor" value="5">5</li>
                                        <li><input type="checkbox" name="floor" value="6">6</li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Type</h5>
                            <div class="categori-checkbox">
                                <form action="#" class="stock">
                                    <ul>
                                        <li><input type="checkbox" name="type" value="1">V.I.P</li>
                                        <li><input type="checkbox" name="type" value="2">Casual</li>
                                        <li><input type="checkbox" name="type" value="3">Studio</li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <a class="search-btn" id="search-btn" style="cursor: pointer; ">Search</a>
                    </div>
                    <!--sidebar-categores-box end  -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wraper Area End Here -->

    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        // Price
        function validatePriceInputs() {
            let minValue = parseInt($('.min-value-price').val());
            let maxValue = parseInt($('.max-value-price').val());

            if (isNaN(minValue) || minValue < 1) {
                minValue = 1;
                $('.min-value-price').val(minValue);
            }
            if (isNaN(maxValue) || maxValue > 100000) {
                maxValue = 100000;
                $('.max-value-price').val(maxValue);
            }
            if (minValue >= maxValue) {
                minValue = maxValue - 1;
                $('.min-value-price').val(minValue);
            }
        }
        $('.min-value-price, .max-value-price').on('change', validatePriceInputs);

        // Search
        $('#search-btn').click(function(e) {
            e.preventDefault();

            let minPrice = $('.min-value-price').val();
            let maxPrice = $('.max-value-price').val();
            let price_de = $('input[name="price-decrea"]:checked').val();
            let price_in = $('input[name="price-increa"]:checked').val();
            let floors = $('input[name="floor"]:checked').map(function() {
                return $(this).val();
            }).get();
            let types = $('input[name="type"]:checked').map(function() {
                return $(this).val();
            }).get();
            let areas = $('input[name="apartment-area"]:checked').map(function() {
                return $(this).val();
            }).get();

            let queryData = {
                min_price: minPrice,
                max_price: maxPrice,
                price_de: price_de,
                price_in: price_in,
                areas: areas,
                types: types,
                floors: floors,
            };

            $.ajax({
                url: '/apartment/search',
                type: 'GET',
                data: queryData,
                success: function(response) {
                    $('#apartment-list').html(response);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                },
            });
        });
    </script>
@endsection
