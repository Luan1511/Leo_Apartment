<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Admin\Banner;
=======
use App\Models\Admin\AdminNotification;
use App\Models\Admin\Banner; 
use App\Models\Point;
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // dd(request()->all());
        $validatedData = $request->validate([
            'customerName' => 'required|string|max:255',
            'customerEmail' => 'nullable|email',
            'contactSubject' => 'nullable|string|max:255',
            'contactMessage' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:0',
        ]);

        $data = [
            'name' => $validatedData['customerName'],
            'email' => $validatedData['customerEmail'],
            'subject' => $validatedData['contactSubject'] ?? 'No Subject',
            'message' => $validatedData['contactMessage'] ?? 'No Message',
        ];

        try {
            Mail::raw($data['message'], function ($message) use ($data) {
                $message->to('luanpvc.23ai@vku.udn.vn')
                    ->subject($data['subject'])
                    ->from($data['email'], $data['name']);
            });

            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $originalFileName = $request->file('image')->getClientOriginalName();
                    $imagePath = $request->file('image')->storeAs('images/banners', $originalFileName, 'public');
                }
            }

            $banner = new Banner([
                'type' => 'advertiser',
                'image' => $imagePath,
            ]);

            $banner->save();

<<<<<<< HEAD
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
=======
            $point = Point::findOrFail(auth()->id());
            $point->update(['point' => $point->point + 50]);

            AdminNotification::create([
                'user_id' => auth()->id(),
                'type' => 'Advertiser banner',
                'content' => 'Got a new advertiser banner',
                'is_read' => 0,
            ]);

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
        }
    }
}
