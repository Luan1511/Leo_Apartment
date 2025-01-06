<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Apartment;
use App\Models\Admin\BuyingApartment;
use App\Models\Admin\RentingApartment;
use App\Models\Admin\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAdminDashboard()
    {
        $userCount = User::where('authority', 2)->count();
        $apartmentCount = Apartment::count();
        $serviceCount = Service::count();
        $buyRequestCount = BuyingApartment::count();
        $rentRequestCount = RentingApartment::count();

        return view(('Admins.dashboard'), compact('userCount', 'apartmentCount', 'serviceCount', 'buyRequestCount', 'rentRequestCount'));
    }
}
