@extends('layouts.app')

@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home-page') }}">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->

    <!-- about wrapper start -->
    <div class="about-us-wrapper pt-60 pb-40">
        <div class="container">
            <div class="row">
                <!-- About Text Start -->
                <div class="col-lg-6 order-last order-lg-first">
                    <div class="about-text-wrap">
<<<<<<< HEAD
                        <h2><span>Provide Best</span>Experience For You</h2>
                        <p>Our apartment complex offers a modern and comfortable living space, designed with the aim of
                            providing convenience and safety for residents. With high-quality infrastructure and complete
                            amenities like a swimming pool, gym, children’s playground, and 24/7 security, we are committed
                            to providing an ideal living environment for you and your family. The smart management system
                            allows residents to easily track activities, make payments, and request assistance quickly and
                            conveniently.</p>
=======
                        <h2><span>Provide Best</span>Product For You</h2>
                        <p>Some of our customer say’s that they trust us and buy our product without any hagitation because
                            they belive us and always happy to buy our product.</p>
                        <p>We provide the beshat they trusted us and buy our product without any hagitation because they
                            belive us and always happy to buy.</p>
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
                    </div>
                </div>
                <!-- About Text End -->
                <!-- About Image Start -->
                <div class="col-lg-5 col-md-10">
                    <div class="about-image-wrap">
<<<<<<< HEAD
                        <img class="img-full" src="{{asset('storage/images/banners/background_1.jpg')}}" alt="About Us" />
=======
                        <img class="img-full" src="images/about-us/about_img.jpg" alt="About Us" />
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
                    </div>
                </div>
                <!-- About Image End -->
            </div>
        </div>
    </div>
    <!-- about wrapper end -->
    <!-- Begin Counterup Area -->
    <div class="counterup-area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-6">
                    <!-- Begin Limupa Counter Area -->
                    <div class="limupa-counter white-smoke-bg">
                        <div class="container">
                            <div class="counter-img">
                                <img src="images/about-us/icon/1.png" alt="">
                            </div>
                            <div class="counter-info">
                                <div class="counter-number">
                                    <h3 class="counter">{{ \App\Models\User::where('authority', 2)->count() }}</h3>
                                </div>
                                <div class="counter-text">
                                    <span>HAPPY CUSTOMERS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- limupa Counter Area End Here -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- Begin limupa Counter Area -->
                    <div class="limupa-counter gray-bg">
                        <div class="counter-img">
                            <img src="images/about-us/icon/2.png" alt="" height="48px">
                        </div>
                        <div class="counter-info">
                            <div class="counter-number">
                                <h3 class="counter">{{ \App\Models\Admin\Laptop::count() }}</h3>
                            </div>
                            <div class="counter-text">
                                <span>LAPTOPS</span>
                            </div>
                        </div>
                    </div>
                    <!-- limupa Counter Area End Here -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- Begin limupa Counter Area -->
                    <div class="limupa-counter white-smoke-bg">
                        <div class="counter-img">
                            <img src="images/about-us/icon/3.png" alt="" height="52px">
                        </div>
                        <div class="counter-info">
                            <div class="counter-number">
                                <h3 class="counter">{{ \App\Models\Admin\Brand::count() }}</h3>
                            </div>
                            <div class="counter-text">
                                <span>BRANDS</span>
                            </div>
                        </div>
                    </div>
                    <!-- limupa Counter Area End Here -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- Begin limupa Counter Area -->
                    <div class="limupa-counter gray-bg">
                        <div class="counter-img">
                            <img src="images/about-us/icon/4.png" alt="" height="60px">
                        </div>
                        <div class="counter-info">
                            <div class="counter-number">
                                <h3 class="counter">{{ \App\Models\Admin\Order::where('status', 4)->count() }}</h3>
                            </div>
                            <div class="counter-text">
                                <span>COMPLETE ORDERS</span>
                            </div>
                        </div>
                    </div>
                    <!-- limupa Counter Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Counterup Area End Here -->
    <!-- team area wrapper start -->
    <div class="team-area pt-60 pt-sm-44">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="li-section-title capitalize mb-25">
                        <h2><span>About me</span></h2>
                    </div>
                </div>
            </div> <!-- section title end -->
            <div class="row" style="justify-content: center">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                        <div class="team-thumb">
                            <img src="images/team/1.jpg" alt="Our Team Member" height="340px">
                        </div>
                        <div class="team-content text-center">
                            <h3>Pham Viet Chi Luan</h3>
                            <p>IT Expert</p>
                            <a href="#">luanpvc.23ai@vku.udn.vn</a>
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                {{-- <a href="#"><i class="fa fa-twitter"></i></a> --}}
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->
<<<<<<< HEAD
=======

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                        <div class="team-thumb">
                            <img src="images/team/2.jpg" alt="Our Team Member" height="340px">
                        </div>
                        <div class="team-content text-center">
                            <h3>Nguyen Ha Nhi</h3>
                            <p>Web Designer</p>
                            <a href="#">nhinh.23ai@vku.udn.vn</a>
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                {{-- <a href="#"><i class="fa fa-twitter"></i></a> --}}
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
            </div>
        </div>
    </div>
    <!-- team area wrapper end -->

    <script>
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });

        $(".li-countdown")
            .countdown("2019/12/01", function(event) {
                $(this).html(
                    event.strftime(
                        '<div class="count">%D <span>Days:</span></div> <div class="count">%H <span>Hours:</span></div> <div class="count">%M <span>Mins:</span></div><div class="count"> %S <span>Secs</span></div>'
                    )
                );
            });
    </script>
@endsection
