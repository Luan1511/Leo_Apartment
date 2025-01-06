<<<<<<< HEAD
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leo Apartment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.0/dist/jquery.fancybox.min.css" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/LuNi_icon.png') }}">
    @vite(['resources/css/app.css'])
    @vite(['resources/css/tables.css'])
    @vite(['resources/css/custom.css'])
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/6e70409343.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.0/dist/jquery.fancybox.min.js"></script>
</head>

<style>
    .form-control {
        border: none !important;
        border-bottom: 1px solid #dee2e6 !important;
        border-radius: 0 !important;
        box-shadow: none !important;
    }

    .avatar-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 200px;
    }

    .admin-avatar {
        width: 150px;
        height: 150px !important;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #dee2e6;
    }

    .update-avatar-btn {
        margin-top: 8px;
        font-size: 12px;
        padding: 5px 10px;
        background-color: #e9d790;
        color: white;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: background-color 0.3s ease;
    }

    .update-avatar-btn i {
        margin-right: 5px;
        font-size: 14px;
    }

    .update-avatar-btn:hover {
        background-color: #efecdd;
    }

    .badge {
        font-size: 13px !important;
    }

    .i-toggle:hover {
        color: #0363cd !important;
        cursor: pointer;
    }

    .active {
        color: #0363cd !important;
    }
</style>

<body>
    {{-- Include Header --}}
    @include('components.header')

    {{-- Main Content --}}
=======
@extends('layouts.app')

@section('content')
    <header>
        @vite(['resources/css/user.css'])
    </header>
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-1"></div>
<<<<<<< HEAD
            {{-- Side bar --}}
            @if ($type == 1)
                @include('components.sidebar-user')
            @elseif ($type == 2)
                @include('components.sidebar-request')
            @endif

            {{-- Content --}}
            @switch($content)
                @case('inform')
                    @include('users.account-inform')
                @break

                @case('buy_request')
                    @include('users.buyRequest')
                @break

                @case('rent_request')
                    @include('users.rentRequest')
                @break

                @case('bills')
                    @include('users.bills')
                @break

                @case('bill')
                    @include('users.single-bill')
                @break

                @case('maintain')
                    @include('users.maintain-request')
                @break

                @default
            @endswitch

        </div>
    </div>

    {{-- Footer --}}
    @include('components.footer')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script>
        $.scrollUp({
            scrollText: '<i class="fa fa-angle-double-up"></i>',
            easingType: 'linear',
            scrollSpeed: 900
        });

        document.addEventListener('DOMContentLoaded', function() {
            @if (session('status') === 'Request Successfully')
                Swal.fire({
                    icon: 'success',
                    title: 'Request Successfully!',
                    text: 'We will come to you soon.',
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
=======

            <!-- Sidebar menu -->
            <div class="col-md-2">
                <div class="list-group shadow-sm rounded-3 p-2 sidebar-menu">
                    <a href="{{ url('user/purchase') }}" id="purchase-nav" class="list-group-item list-group-item-action">
                        <i class="bi bi-card-list"></i> Purchase History
                    </a>
                    <a href="{{url('user/profile')}}" id="account-nav" class="list-group-item list-group-item-action">
                        <i class="bi bi-person"></i> Your account
                    </a>
                    <a href="{{url('user/voucher')}}" class="list-group-item list-group-item-action" id="voucher-nav">
                        <i class="bi bi-person"></i> Your vouchers
                    </a>
                    <a href="{{url('user/report')}}" class="list-group-item list-group-item-action" id="report-nav">
                        <i class="bi bi-telephone"></i> Report
                        {{-- <span class="badge bg-danger text-white">NEW</span> --}}
                    </a>
                    <a href="{{route('logout')}}" class="list-group-item list-group-item-action">
                        <i class="bi bi-box-arrow-right"></i> Log out of account
                    </a>
                </div>
                <div class="member-pointer">
                    <span>Your point: </span>
                    @php
                        if (isset(Auth::user()->point->point)) {
                            echo '<a onclick="displayVoucherPanel()" style="color: #0363cd">' .
                                Auth::user()->point->point . 
                                '</a>';
                        } else {
                            echo '<iframe src="' . route('error.point') . '" style="display:none"></iframe>';
                            header('Refresh:0');
                            exit();
                        }
                    @endphp
                </div>
            </div>

            <div class="col-md-8">
                <div class="rounded-3 p-4 content-container">
                    @yield('content-user')
                </div>
            </div>

            <div class="col-md-1"></div>
        </div>
    </div>

    {{-- Voucher --}}
    <div class="voucher-panel">
        <a><i class="fa fa-times-circle" aria-hidden="true" onclick="displayVoucherPanel()"></i></a>
        <div class="voucher-container row" id="voucher">
            <li class="voucher-item">
                <img src="{{ asset('storage/images/vouchers/5.png') }}" alt="voucher1" class="voucher-img">
                <div class="">
                    <h5>Voucher 1</h5>
                    <p>Get 5% off your next purchase</p>
                </div>
                @if (Auth::user()->point->point >= 500)
                    <a href="{{ url('user/voucher/create/5') }}" class="brand-btn pl-20 pr-20">500</a>
                @else
                    <a class="brand-btn disable-btn pl-20 pr-20">500</a>
                @endif
            </li>
            <li class="voucher-item">
                <img src="{{ asset('storage/images/vouchers/7.png') }}" alt="voucher1" class="voucher-img">
                <div class="">
                    <h5>Voucher 1</h5>
                    <p>Get 7% off your next purchase</p>
                </div>
                @if (Auth::user()->point->point >= 700)
                    <a href="{{ url('user/voucher/create/7') }}" class="brand-btn pl-20 pr-20">700</a>
                @else
                    <a class="brand-btn disable-btn pl-20 pr-20">700</a>
                @endif
            </li>
            <li class="voucher-item">
                <img src="{{ asset('storage/images/vouchers/10.png') }}" alt="voucher1" class="voucher-img">
                <div class="">
                    <h5>Voucher 1</h5>
                    <p>Get 10% off your next purchase</p>
                </div>
                @if (Auth::user()->point->point >= 1000)
                    <a href="{{ url('user/voucher/create/10') }}" class="brand-btn pl-20 pr-20">1000</a>
                @else
                    <a class="brand-btn disable-btn pl-20 pr-20">1000</a>
                @endif
            </li>
        </div>
    </div>
    @include('components.response-voucher')

    <script>
        function displayVoucherPanel() {
            $('.voucher-panel').toggleClass('display-voucher');
            // fetchLaptop();
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if (session('status') === 'Created Successfully')
                Swal.fire({
                    title: "Success!",
                    text: "Code: " + @json(session('code')),
                    icon: "success",
                    buttons: true,
                    confirmButtonText: "Copy the code",
                }).then(() => {
                    let textToCopy = @json(session('code'));
                    navigator.clipboard.writeText(textToCopy).then(() => {
                        Swal.fire("Success!", "The code was copied!", "success");
                    });
                });
            @elseif (session('status') === 'Report Successfully')
                Swal.fire({
                    title: "Success!",
                    text: "Thank you for the report!",
                    icon: "success",
                    buttons: true,
                    confirmButtonText: "Thank",
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
                });
            @endif
        });
    </script>
<<<<<<< HEAD
</body>

</html>
=======
@endsection
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
