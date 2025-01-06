<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Admin\Apartment;
use App\Models\Admin\ImagesApartment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ApartmentController extends Controller
{
    public function getApartment()
    {
        $apartments = Apartment::select([
            'id',
            'type',
            'status',
            'floor',
            'area',
            'price_per_month',
            'price_sale',
            'apartment_number',
            'bed',
            'bath',
            'image',
            'created_at',
            'updated_at',
        ])->get()
            ->map(function ($apartment) {
                $apartment->img_url = asset('storage/' . $apartment->image);
                return $apartment;
            });

        return response()->json(['data' => $apartments]);
    }

    public function showDetailApartment(int $id)
    {
        $apartment = Apartment::findOrFail($id);
        $images = ImagesApartment::where('apartment_id', $id)->get();
        return view('Admins.components.apartments.detail', compact('apartment', 'images'));
    }

    public function showApartment()
    {
        return view('Admins.components.apartments.list');
    }

    public function addApartment()
    {
        return view('Admins.components.apartments.add');
    }

    public function addApartmentHandle(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'number' => 'required|string|max:255',
                'type' => 'required|integer|min:0',
                'floor' => 'nullable|integer|min:0',
                'bathroom' => 'nullable|integer|min:0',
                'bedroom' => 'nullable|integer|min:0',
                'area' => 'required|integer|min:0',
                'price_per_month' => 'nullable|numeric|min:0',
                'price_sale' => 'nullable|numeric|min:0',
                'description' => 'nullable|string',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:0',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        if ($request->hasFile('images')) {
            if ($request->file('images')[0]) {
                $originalFileName = $request->file('images')[0]->getClientOriginalName();
                $imagePath = $request->file('images')[0]->storeAs('images/apartments', $originalFileName, 'public');
            }
        }

        $apartment = new Apartment([
            'type' => $request->type,
            'status' => 1,
            'floor' => $request->floor,
            'area' => $request->area,
            'price_per_month' => $request->price_per_month,
            'price_sale' => $request->price_sale,
            'apartment_number' => $request->number,
            'bed' => $request->bedroom,
            'bath' => $request->bathroom,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        $apartment->save();

        for ($i = 0; $i < count($request->file('images')); $i++) {
            if ($request->hasFile('images')) {
                if ($request->file("images")[$i]) {
                    $image = $request->file("images")[$i];
                    $originalName = $request->file("images")[$i]->getClientOriginalName();
                    $imagePath = $image->storeAs('images/apartments', $originalName, 'public');

                    $apartmentImage = new ImagesApartment();
                    $apartmentImage->apartment_id = $apartment->id;
                    $apartmentImage->image = $imagePath;
                    $apartmentImage->save();
                }
            }
        }

        return redirect()->route('admin-showApartment')->with('status', 'Apartment Added');
    }

    public function destroy(int $id)
    {
        $apartment = Apartment::findOrFail($id);

        $images_apartment = ImagesApartment::where('apartment_id', $id)->get();
        foreach ($images_apartment as $image) {
            if ($image->image_url) {
                $fullPath = public_path('storage/' . $image->image_url);
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
            $image->delete();
        }

        if ($apartment->img) {
            $fullPath = public_path('storage/' . $apartment->img);
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

        $apartment->delete();

        return redirect()->back()->with('status', 'Apartment Deleted');
    }



    public function edit(int $id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('Admins.components.apartments.edit', compact('apartment'));
    }

    public function update(Request $request, int $id)
    {
        // dd(request()->all());

        $request->validate([
            'number' => 'required|string|max:255',
            'type' => 'required|integer|min:0',
            'floor' => 'nullable|integer|min:0',
            'bath' => 'nullable|integer|min:0',
            'bed' => 'nullable|integer|min:0',
            'area' => 'required|integer|min:0',
            'price_per_month' => 'nullable|numeric|min:0',
            'price_sale' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:0',
        ]);

        $apartment = Apartment::findOrFail($id);

        $imagePath = $apartment->image;
        if ($apartment->image == null || $apartment->image == '') {
            $imagePath = $apartment->image;
        } else {
            if ($request->hasFile('image')) {
                $originalFileName = $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('images/apartments', $originalFileName, 'public');

                if (File::exists($apartment->image)) {
                    File::delete($apartment->image);
                }
            }
        }

        $apartment->update([
            'type' => $request->type,
            'status' => 1,
            'floor' => $request->floor,
            'area' => $request->area,
            'price_per_month' => $request->price_per_month,
            'price_sale' => $request->price_sale,
            'apartment_number' => $request->number,
            'bed' => $request->bed,
            'bath' => $request->bath,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->back()->with('status', 'Apartment Updated');
    }

    public function searchInPage(Request $request)
    {
        $query = Apartment::query();

        if ($request->filled('max_price') && $request->filled('min_price')) {
            $minPrice = (float) $request->input('min_price');
            $maxPrice = (float) $request->input('max_price');

            if ($minPrice <= $maxPrice) {
                $query->whereBetween('price_sale', [$minPrice, $maxPrice]);
            } else {
                $query->where('price_sale', '<=', $maxPrice);
            }
        } elseif ($request->filled('max_price')) {
            $query->where('price_sale', '<=', (float) $request->input('max_price'));
        } elseif ($request->filled('min_price')) {
            $query->where('price_sale', '>=', (float) $request->input('min_price'));
        }

        if ($request->filled('floors')) {
            $query->whereIn('floor', $request->input('floors'));
        }

        if ($request->filled('types')) {
            $query->where('type', $request->input('types'));
        }

        if ($request->filled('areas')) {
            $query->where('area', '<=', $request->input('areas'));
        }

        if ($request->filled('price_de')) {
            $query->orderBy('price_sale', 'desc');
        }

        if ($request->filled('price_in')) {
            $query->orderBy('price_sale', 'asc');
        }

        $apartments = $query->get();

        return view('components.apartment-render', compact('apartments'));
    }
}
