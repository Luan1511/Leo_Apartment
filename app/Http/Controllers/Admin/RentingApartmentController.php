<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Apartment;
use App\Models\Admin\RentingApartment;
use App\Models\RenTalPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentingApartmentController extends Controller
{
    public function rentApart(Request $request)
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
            'checkin_date' => 'nullable|date',
            'checkout_date' => 'nullable|date',
        ]);

        $checkin_date = Carbon::createFromFormat('Y-m-d', $request->input('checkin_date'))
            ->setTime(now()->hour, now()->minute, now()->second)
            ->toDateTimeString();
        $checkout_date = Carbon::createFromFormat('Y-m-d', $request->input('checkout_date'))
            ->setTime(now()->hour, now()->minute, now()->second)
            ->toDateTimeString();

        $imagePath = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalFileName = $file->getClientOriginalName();
            $imagePath = $file->storeAs('images/CCCDs', $originalFileName, 'public');
        }

        // Create order
        $order = new RentingApartment();
        $order->user_id = $user->id;
        $order->name = $request->input('name');
        $order->apartment_id = $request->input('apartment_id');
        $order->address = $request->input('address');
        $order->status = 1;
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->CCCD = $request->input('cccdNumber');
        $order->CCCD_image = $imagePath;
        $order->checkin_date = $checkin_date;
        $order->checkout_date = $checkout_date;
        $order->save();

        $apartment = Apartment::findOrFail($request->input('apartment_id'));
        $apartment->status = 4;
        $apartment->save();

        return redirect()->back()->with('status', 'rented');
    }

    public function getRentRequest()
    {
        $rentRequests = RentingApartment::with('apartment:id,apartment_number,price_sale')->select([
            'id',
            'user_id',
            'name',
            'apartment_id',
            'checkin_date',
            'checkout_date',
            'CCCD',
            'CCCD_image',
            'address',
            'phone',
            'email',
            'status',
            'created_at',
            'updated_at',
        ])->get();

        return response()->json(['data' => $rentRequests]);
    }

    public function showRentRequest()
    {
        return view('Admins.components.rent_requests.list');
    }

    public function detail(int $id)
    {
        $rentRequest = RentingApartment::findOrFail($id);
        $apartment = Apartment::findOrFail($rentRequest->apartment_id);

        return view('Admins.components.rent_requests.detail', compact('rentRequest', 'apartment'));
    }

    public function deny(int $id)
    {
        $order = RentingApartment::findOrFail($id);
        $order->update(['status' => 3]);
        return redirect()->route('admin-showRentRequest')->with('status', true);
    }

    public function delete(int $id)
    {
        $order = RentingApartment::findOrFail($id);
        $order->delete();
        return redirect()->route('admin-showRentRequest')->with('status', true);
    }

    public function approve(int $id)
    {
        $order = RentingApartment::findOrFail($id);
        $order->update(['status' => 2]);
        return redirect()->route('admin-showRentRequest')->with('status', true);
    }

    public function getRentalCalendar($id)
    {
        $renting = RentingApartment::with(['payments'])->find($id);

        if (!$renting) {
            return response()->json(['error' => 'Renting record not found'], 404);
        }

        $checkin = Carbon::parse($renting->checkin_date);
        $checkout = Carbon::parse(now());

        // Lấy danh sách các tháng đã thanh toán
        $paidMonths = $renting->payments->pluck('month')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m');
        })->toArray();

        // Tạo danh sách tháng
        $months = [];
        $current = $checkin->copy();
        while ($current <= $checkout) {
            $months[] = [
                'month' => $current->format('Y-m'),
                'isPaid' => in_array($current->format('Y-m'), $paidMonths),
            ];
            $current->addMonth();
        }

        return response()->json(['months' => $months]);
    }

    public function markMonthAsPaid(Request $request, $id)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m'
        ]);

        $renting = RentingApartment::find($id);

        if (!$renting) {
            return response()->json(['error' => 'Renting record not found'], 404);
        }

        $month = Carbon::parse($request->input('month'))->startOfMonth();

        // Kiểm tra xem tháng đã được thanh toán chưa
        $existingPayment = RentalPayment::where('renting_id', $id)->where('month', $month->format('Y-m-d'))->first();
        if ($existingPayment) {
            return response()->json(['error' => 'Month already paid'], 400);
        }

        // Tạo bản ghi thanh toán
        RenTalPayment::create([
            'renting_id' => $id,
            'month' => $month->format('Y-m-d')
        ]);

        return response()->json(['success' => true]);
    }
}
