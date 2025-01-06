<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\Apartment;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->with('apartment')->get();
        return view('wishlist.index', compact('wishlist'));
    }

    public function getWishlist()
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->with('apartment')->get();
        $apartments = $wishlist->pluck('apartment');
        return response()->json(['data' => $apartments]);
    }


    public function add(int $apartment_id)
    {
        $user = Auth::user();

        if ($this->checkApartmentInWishlist($apartment_id)){
            return redirect()->back()->with('status', 'existed');
        }

        $wishlistItem = Wishlist::firstOrCreate([
            'user_id' => $user->id,
            'apartment_id' => $apartment_id
        ]);

        return redirect()->back()->with('status', 'added');
    }

    public function remove(int $apartment_id)
    {
        $user = Auth::user();
        Wishlist::where('user_id', $user->id)->where('apartment_id', $apartment_id)->delete();

        return redirect()->back()->with('success', 'Apartment removed from wishlist');
    }

    public function checkApartmentInWishlist(int $apartment_id)
    {
        $user = Auth::user();  

        $exists = Wishlist::where('user_id', $user->id)
            ->where('apartment_id', $apartment_id)
            ->exists();

        return $exists;
    }
}
