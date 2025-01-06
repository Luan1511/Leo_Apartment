@extends('layouts.app')

@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Community</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Main Blog Page Area -->
    <div class="li-main-blog-page pt-60 pb-55">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Blog Sidebar Area -->
                <div class="col-lg-3 order-lg-1 order-2">
                    <div class="li-blog-sidebar-wrapper">
                        <div class="li-blog-sidebar">
                            <div class="li-sidebar-search-form">
                                <form action="#">
                                    <input type="text" class="li-search-field" placeholder="search here">
                                    <button type="submit" class="li-search-btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="li-blog-sidebar mt-20">
                            <h4 class="li-blog-sidebar-title">Blog Archives</h4>
                            <ul class="li-blog-archive">
                                @if (isset($archives))
                                    @foreach ($archives as $archive)
                                        <li>
                                            <a
                                                href="{{ route('community.index', ['month' => $archive->month, 'year' => $archive->year]) }}">
                                                {{ Carbon\Carbon::createFromDate($archive->year, $archive->month, 1)->format('F Y') }}
                                                ({{ $archive->count }})
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="li-blog-sidebar">
                            <ul class="li-blog-tags">
                                <li><a href="{{ route('community-createForm') }}">Create your post</a></li><br>
                                <li><a href="{{ route('community.index') }}">All posts</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="li-blog-sidebar-wrapper mt-40 pr-20">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-area">
                                    <div class="slider-active owl-carousel">
                                        @if (isset($bannerAds))
                                            @foreach ($bannerAds as $bannerAd)
                                                <!-- Begin Single Slide Area -->
                                                <a href="{{ asset('storage/' . $bannerAd->image) }}" data-fancybox="gallery"
                                                    data-caption="Caption for this image"
                                                    class="single-slide align-center-left animation-style-01 bg-1"
                                                    style="background-image: url('{{ asset('storage/' . $bannerAd->image) }}'); ">
                                                    <div class="text-center"
                                                        style="width: 100%; position: absolute; color: black; font-size: 15px; top: 5px; background-color: #61CFD3; opacity: 80%; font-weight: bold">
                                                        Advertisement</div>
                                                </a>
                                                <!-- Single Slide Area End Here -->
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Li's Blog Sidebar Area End Here -->
                <!-- Begin Li's Main Content Area -->
                <div class="col-lg-9 order-lg-2 order-1">
                    @yield('content-post')
                </div>
                <!-- Li's Main Content Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Main Blog Page Area End Here -->

    <script>
        $(".slider-active").owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoplay: true,
            items: 1,
            autoplayTimeout: 10000,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: true,
            autoHeight: true,
            lazyLoad: true
        });
    </script>
@endsection
