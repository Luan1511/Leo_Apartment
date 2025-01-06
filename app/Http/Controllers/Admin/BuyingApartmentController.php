<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Apartment;
use App\Models\Admin\BuyingApartment;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyingApartmentController extends Controller
{
    public function buyApart(Request $request)
    {
        // dd(request()->all());
        $user = Auth::user();

        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'cccdNumber' => 'required|string|max:20',
            'image' => 'nullable|file|image|min:0',
            'apartment_id' => 'required|exists:apartment,id',
        ]);

        $imagePath = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalFileName = $file->getClientOriginalName();
            $imagePath = $file->storeAs('images/CCCDs', $originalFileName, 'public');
        }

        // Create order
        $order = new BuyingApartment();
        $order->user_id = $user->id;
        $order->name = $request->input('name');
        $order->apartment_id = $request->input('apartment_id');
        $order->address = $request->input('address');
        $order->status = 1;
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->CCCD = $request->input('cccdNumber');
        $order->CCCD_image = $imagePath;
        $order->save();

        $apartment = Apartment::findOrFail($request->input('apartment_id'));
        $apartment->status = 4;
        $apartment->save();

        return redirect()->back()->with('status', 'bought');
    }

    public function getBuyRequest()
    {
        $buyRequests = BuyingApartment::with('apartment:id,apartment_number,price_sale')->with('customer:id')->select([
            'id',
            'user_id',
            'name',
            'apartment_id',
            'CCCD',
            'CCCD_image',
            'address',
            'phone',
            'email',
            'status',
            'created_at',
            'updated_at',
        ])->get();

        return response()->json(['data' => $buyRequests]);
    }

    public function showBuyRequest()
    {
        return view('Admins.components.buy_requests.list');
    }

    public function detail(int $id)
    {
        $buyRequest = BuyingApartment::findOrFail($id);
        $apartment = Apartment::findOrFail($buyRequest->apartment_id);

        return view('Admins.components.buy_requests.detail', compact('buyRequest', 'apartment'));
    }

    public function deny(int $id)
    {
        $order = BuyingApartment::findOrFail($id);
        $order->update(['status' => 3]);
        return redirect()->route('admin-showBuyRequest')->with('status', true);
    }

    public function delete(int $id)
    {
        $order = BuyingApartment::findOrFail($id);
        $order->delete();
        return redirect()->route('admin-showBuyRequest')->with('status', true);
    }

    public function approve(int $id, int $user_id)
    {
        $request = BuyingApartment::findOrFail($id);
        $request->update([
            'status' => 2,
            'approved_at' => now()
        ]);

        if (Resident::where('user_id', auth()->id())->count() < 1) {
            $resident = new Resident();
            $resident->user_id = $user_id;
            $resident->apartment_id = $request->apartment_id;
            $resident->CCCD = $request->CCCD;
            $resident->bought_at = $request->approved_at;
            $resident->save();
        }

        return redirect()->route('admin-showBuyRequest')->with('status', true);
    }
}
