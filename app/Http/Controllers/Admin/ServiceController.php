<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function getService()
    {
        $services = Service::select([
            'id',
            'name',
            'description',
            'price',
            'for_resident',
            'image',
            'rating',
            'created_at',
            'updated_at',
        ])->get()
            ->map(function ($service) {
                $service->img_url = asset('storage/' . $service->image);
                return $service;
            });

        return response()->json(['data' => $services]);
    }

    public function showDetailService(int $id)
    {
        $service = Service::findOrFail($id);
        return view('Admins.components.services.detail', compact('service'));
    }

    public function showService()
    {
        return view('Admins.components.services.list');
    }

    public function addService()
    {
        return view('Admins.components.services.add');
    }

    public function addServiceHandle(Request $request)
    {
        // dd(request()->all());
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'for_resident' => 'nullable|in:yes,no',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:0',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        if ($request->hasFile('image')) {
            if ($request->file('image')) {
                $originalFileName = $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('images/services', $originalFileName, 'public');
            }
        }

        $service = new Service([
            'name' => $request->name,
            'price' => $request->price,
            'for_resident' => $request->for_resident,
            'description' => $request->description,
            'image' => $imagePath,
            'rating' => 0,
        ]);

        $service->save();

        return redirect()->route('admin-showService')->with('status', 'Service Added');
    }

    public function destroy(int $id)
    {
        $service = Service::findOrFail($id);

        if ($service->img) {
            $fullPath = public_path('storage/' . $service->img);
            if (File::exists($fullPath)) {
                try {
                    File::delete($fullPath);
                } catch (\Exception $e) {
                    Log::error('Failed to delete image: ' . $e->getMessage());
                }
            } else {
                Log::warning('Image file not found: ' . $fullPath);
            }
        }

        $service->delete();

        return redirect()->back()->with('status', 'Service Deleted');
    }



    public function edit(int $id)
    {
        $service = Service::findOrFail($id);
        return view('Admins.components.services.edit', compact('service'));
    }

    public function update(Request $request, int $id)
    {
        // dd(request()->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'for_resident' => 'nullable|in:yes,no',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:0',
        ]);

        $service = Service::findOrFail($id);

        $imagePath = '';
        if ($request->image == null) {
            $imagePath = $service->image;
        } else {
            if ($request->hasFile('image')) {
                $originalFileName = $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('images/services', $originalFileName, 'public');

                if (File::exists($service->image)) {
                    File::delete($service->image);
                }
            }
        }

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'for_resident' => $request->for_resident,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('status', 'Service Updated');
    }

    public function serviceDetail($id)
    {
        $service = Service::findOrFail($id);

        return view('single-service', compact('service'));
    }
}
