<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {

        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'resident_id' => Auth::user()->resident->id,
            'post_id' => $postId,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment created');
    }

    public function reply(Request $request, $commentId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'resident_id' => Auth::user()->resident->id,
            'post_id' => Comment::findOrFail($commentId)->post_id,
            'content' => $request->content,
            'parent_id' => $commentId,
        ]);

        return redirect()->back()->with('replied', 'Replied!');
    }
}
