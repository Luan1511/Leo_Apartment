<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\CommunityPost;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityPostController extends Controller
{
    public function index(Request $request)
    {
        $query = CommunityPost::with([
            'resident',
            'resident.user',
            'comment_count',
        ]);

        if ($request->has('month') && $request->has('year')) {
            $month = $request->input('month');
            $year = $request->input('year');

            $query->whereYear('created_at', $year)
                ->whereMonth('created_at', $month);
        }

        $posts = $query->get();

        $archives = CommunityPost::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get();

        $bannerAds = Banner::where('type', 'advertiser')->get();

        return view('community', compact('posts', 'archives', 'bannerAds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|min:0',
            'video' => 'nullable|mimes:mp4,avi|max:100000',
        ]);

        $userID = Auth::user()->id;
        $resident = Resident::where('user_id', $userID)->first();

        CommunityPost::create([
            'resident_id' => $resident->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image') ? $request->file('image')->store('images/posts', 'public') : null,
            'video' => $request->file('video') ? $request->file('video')->store('images/posts', 'public') : null,
        ]);

        return redirect()->back()->with('success', 'Posted Successfully');
    }

    public function show($id)
    {
        $post = CommunityPost::with([
            'resident',
            'resident.user',
            'comment_count',
            'comments' => function ($query) {
                $query->whereNull('parent_id');
            },
        ])->findOrFail($id);

        return view('post-detail', compact('post'));
    }

    public function remove($id)
    {
        try {
            $post = CommunityPost::find($id);

            if (!$post) {
                return redirect()->back()->with('success', 'Post not found');
            }

            $post->comments()->delete();

            $post->delete();

            return route('community.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Post and related comments removed failed');
        }
    }
}
