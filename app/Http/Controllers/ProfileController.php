<?php

namespace App\Http\Controllers;

use App\Models\Admin\AdminNotification;
<<<<<<< HEAD
use App\Models\Admin\Apartment;
use App\Models\Admin\BuyingApartment;
use App\Models\Admin\RentingApartment;
=======
use App\Models\Admin\Order;
use App\Models\LicenseComment;
use App\Models\Point;
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return view('profile');
    }

<<<<<<< HEAD
    public function show(int $type, $content)
    {
        $user = Auth::user();
        return view('layouts.user-layout', compact('user', 'type', 'content'));
=======
    public function profileView()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    }

    public function update(Request $request, int $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'gender' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:526',
            'birthday' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            $originalFileName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images/User', $originalFileName, 'public');

            if ($user->img && File::exists(public_path('storage/' . $user->img))) {
                File::delete(public_path('storage/' . $user->img));
            }
        } else {
            $imagePath = $user->img;
        }

        $updateData = [];
        if ($request->name) {
            $updateData['name'] = $request->name;
        }
        if ($request->email) {
            $updateData['email'] = $request->email;
        }
        if ($request->gender) {
            $updateData['gender'] = $request->gender;
        }
        if ($request->phone) {
            $updateData['phone'] = $request->phone;
        }
        if ($request->address) {
            $updateData['address'] = $request->address;
        }
        if ($request->birthday) {
            $updateData['birthday'] = $request->birthday;
        }
        if (isset($imagePath)) {
            $updateData['img'] = $imagePath;
        }
        $user->update($updateData);

<<<<<<< HEAD
        return redirect()->route('profile-page', ['type' => 1, 'content' => 'inform'])
            ->with('status', 'Updated');
    }

    public function getBuyRequest()
    {
        $user_id = Auth::user()->id;
        $buyRequests = BuyingApartment::where('user_id', $user_id)->with('apartment:id,apartment_number,price_per_month,price_sale,image,type,area')->select([
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

    public function getBuyRequestResponsing()
    {
        $buyRequests = BuyingApartment::with('apartment:id,apartment_number,price_per_month,price_sale,image,type,area')->where('status', 1)->where('user_id', Auth::user()->id)->select([
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

    public function getBuyRequestApproved()
    {
        $buyRequests = BuyingApartment::with('apartment:id,apartment_number,price_per_month,price_sale,image,type,area')->where('status', 2)->where('user_id', Auth::user()->id)->select([
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

    public function getBuyRequestDenied()
    {
        $buyRequests = BuyingApartment::with('apartment:id,apartment_number,price_per_month,price_sale,image,type,area')->where('status', 3)->where('user_id', Auth::user()->id)->select([
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

    // ------ Rent request -------- //
    public function getRentRequest()
    {
        $user_id = Auth::user()->id;
        $rentRequest = RentingApartment::where('user_id', $user_id)->with('apartment:id,apartment_number,price_per_month,price_sale,image,type,area')->select([
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
        return response()->json(['data' => $rentRequest]);
    }
    public function getRentRequestResponsing()
    {
        $rentRequest = RentingApartment::with('apartment:id,apartment_number,price_per_month,price_sale,image,type,area')->where('status', 1)->where('user_id', Auth::user()->id)->select([
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

        return response()->json(['data' => $rentRequest]);
    }
    public function getRentRequestApproved()
    {
        $rentRequest = RentingApartment::with('apartment:id,apartment_number,price_per_month,price_sale,image,type,area')->where('status', 2)->where('user_id', Auth::user()->id)->select([
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

        return response()->json(['data' => $rentRequest]);
    }
    public function getRentRequestDenied()
    {
        $rentRequest = RentingApartment::with('apartment:id,apartment_number,price_per_month,price_sale,image,type,area')->where('status', 3)->where('user_id', Auth::user()->id)->select([
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

        return response()->json(['data' => $rentRequest]);
    }
    // End rent request

    public function detailBill($id)
    {
        $type = 1;
        $content = 'bill';
        $apartment = RentingApartment::with('apartment')->where('id', $id)->first();
        return view('layouts.user-layout', compact('id', 'type', 'content', 'apartment'));
    }

    public function createMaintainRequest(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'content' => 'required|string|max:255',
            'apartment' => 'required|int',
            'request_type' => 'required|string|max:255',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imagePath = "";
        if ($request->hasFile('image')) {
            $originalFileName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images/Maintainces', $originalFileName, 'public');
        }

        $report = [
            'content' => $request->date . ' | ' . $request->request_type . ' | ' . $request->content,
            'user_id' => auth()->id(),
            'apartment_id' =>$request->apartment_id,
            'type' => 'Error report',
            'is_read' => 0,
            'image' => $imagePath,
        ];
        AdminNotification::create($report);
        return redirect()->back()->with('status', 'Request Successfully');
    }

    public function getMyApartment()
    {
        $apartments = User::where('id', auth()->id())
            ->with('resident.apartment:id,apartment_number') 
            ->first()
            ->resident
            ->apartment;

        return response()->json(['data' => $apartments]);
=======
        return redirect()->route('profile-page', ['id' => $user->id])
            ->with('status', 'Updated');
    }

    public function purchaseView()
    {
        $purchases = Order::where('customer_id', auth()->id())
            ->where('status', 1)
            ->with('subOrder.laptop')->get();

        return view('users.purchase', compact('purchases'));
    }

    public function purchaseMaking()
    {
        $purchases = Order::where('customer_id', auth()->id())
            ->where('status', 1)
            ->with('subOrder.laptop')->get();

        return view('users.render-purchase', compact('purchases'));
    }

    public function purchaseDelivering()
    {
        $purchases = Order::where('customer_id', auth()->id())
            ->where('status', 2)
            ->with('subOrder.laptop')->get();

        return view('users.render-purchase', compact('purchases'));
    }

    public function purchaseCompleted()
    {
        $purchases = Order::where('customer_id', auth()->id())
            ->where('status', 4)
            ->with('subOrder.laptop')->get();

        return view('users.render-purchase', compact('purchases'));
    }

    public function purchaseDenied()
    {
        $purchases = Order::where('customer_id', auth()->id())
            ->where('status', 3)
            ->with('subOrder.laptop')->get();

        return view('users.render-purchase', compact('purchases'));
    }

    public function purchaseReceived($id)
    {
        $purchase = Order::findOrFail($id);
        $purchase->update(['status' => 4]);

        $point = Point::where('user_id', auth()->id())->first();
        $point->update(['point' => $point->point + (int)($purchase->total_price * 0.1)]);

        $subOrders = $purchase->subOrder;
        foreach ($subOrders as $subOrder) {
            $license = LicenseComment::where('user_id', auth()->id())->where('laptop_id', $subOrder->laptop->id)->get();
            if ($license->count() < 1) {
                LicenseComment::create([
                    'user_id' => auth()->id(),
                    'laptop_id' => $subOrder->laptop->id,
                ]);
            }

            $laptop = $subOrder->laptop;
            $laptop->update([
                'stock' => $laptop->stock - $subOrder->quantity,
                'sell' => $laptop->sell + $subOrder->quantity
            ]);
        }

        // Notification::create([
        //     'user_id' => auth()->id(),
        //     'type' => 'Order received',
        //     'content' => 'Got a new order',
        //     'is_read' => 0,
        // ]);

        return redirect()->back()
            ->with('status', 'Received Successfully');
    }

    public function createVoucher($discount)
    {
        $code = bin2hex(random_bytes(10 / 2));
        Voucher::create([
            'code' => $code,
            'user_id' => auth()->id(),
            'discount' => $discount,
            'is_used' => 0,
            'expiration_date' => now()->modify('+30 days'),
        ]);

        $point = Point::where('user_id', auth()->id())->first();
        $point->update(['point' => $point->point - $discount * 100]);

        return redirect()->back()->with(
            [
                'status' => 'Created Successfully',
                'code' => $code
            ]
        );
    }

    public function voucherView()
    {
        $vouchers = Voucher::where('user_id', auth()->id())
            ->where('is_used', 0)->get();

        return view('users.voucher', compact('vouchers'));
    }

    public function reportView()
    {
        return view('users.report');
    }

    public function createReport(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'report_type' => 'required|string|max:255',
            'date' => 'nullable|date',
            // 'report_type' => 'required|string|max:255',
        ]);

        $report = [
            'content' => $request->date . ' | ' . $request->report_type . ' | ' . $request->content,
            'user_id' => auth()->id(),
            'type' => 'Error report',
            'is_read' => 0,
        ];
        AdminNotification::create($report);
        return redirect()->back()->with('status', 'Report Successfully');

        // $code = bin2hex(random_bytes(10 / 2));
        // Voucher::create([
        //     'code' => $code,
        //     'user_id' => auth()->id(),
        //     'discount' => $discount,
        //     'is_used' => 0,
        //     'expiration_date' => now()->modify('+30 days'),
        // ]);

        // $point = Point::where('user_id', auth()->id())->first();
        // $point->update(['point' => $point->point - $discount * 100]);

        // return redirect()->back()->with(
        //     [
        //         'status' => 'Created Successfully',
        //         'code' => $code
        //     ]
        // );
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    }
}
