<div class="sidebar" id="sidebar-menu" style="display: block;">
    <ul class="container">
        {{-- Menu item --}}
        <li class="menu-item pt-40 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-dashboard-page') }}">
                <i class="fa-solid fa-chart-line mr-4"></i><span class="label-item">Dashboard</span>
            </a>
        </li>

        {{-- Account --}}
        <li class="menu-item pt-20 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-showAccount') }}">
                <i class="fa-solid fa-users mr-4"></i><span class="label-item">Accounts</span>
            </a>
        </li>

        {{-- Orders --}}
        {{-- <li class="menu-item pt-20 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-showOrder')}}">
                <i class="fa-solid fa-box-open mr-4"></i><span class="label-item">Orders</span>
            </a>
<<<<<<< HEAD
        </li> --}}

        {{-- Buy requests --}}
        <li class="menu-item pt-20 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-showBuyRequest') }}">
                <i class="fa-solid fa-credit-card mr-4"></i></i><span class="label-item">Buy requests</span>
            </a>
        </li>

        {{-- Rent requests --}}
        <li class="menu-item pt-20 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-showRentRequest') }}">
                <i class="fa fa-money mr-4"></i><span class="label-item">Rent requests</span>
            </a>
        </li>

        {{-- Apartment --}}
        <li class="menu-item pt-20 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-showApartment') }}">
                <i class="fa-regular fa-building mr-4"></i><span class="label-item">Apartment</span>
            </a>
        </li>

        {{-- Service --}}
        <li class="menu-item pt-20 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-showService') }}">
                <i class="fa-solid fa-boxes-packing mr-4"></i><span class="label-item">Service</span>
            </a>
        </li>

        {{-- Banners --}}
=======
        </li>

        {{-- Payments --}}
        <li class="menu-item pt-20 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-showPayment')}}">
                <i class="fa-regular fa-credit-card mr-4"></i><span class="label-item">Payments</span>
            </a>
        </li>

>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
        <li class="menu-item pt-20 pb-20 ml-auto mr-auto mt-auto mb-auto">
            <a href="{{ route('admin-showBanner')}}">
                <i class="fa-solid fa-screwdriver-wrench mr-4"></i><span class="label-item">Banners</span>
            </a>
        </li>
    </ul>

    <div class="text-center mt-40">
        <a href="{{ route('home-page') }}" class="text-center ml-auto mr-auto"
            style="width: 100%; font-size: 30px; background-color: rgba(255, 255, 255, 0.472); border-radius: 100%; padding: 15px 17px; color: black">
            <i class="fa-solid fa-house"></i>
        </a>
        <div class="mt-30"></div>
        <a class="text-center ml-auto mr-auto" onclick="toggleMenu()"
            style="width: 100%; font-size: 30px; background-color: rgba(255, 255, 255, 0.472); border-radius: 50%; padding: 15px 18px; color: black">
            <i class="fa-solid fa-circle-left"></i>
        </a>
    </div>
</div>
