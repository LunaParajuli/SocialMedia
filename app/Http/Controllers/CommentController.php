<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{

    public function createComment(){
        return view('comment.edit');
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            // 'username' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        $comment = new Comment([
            // 'username' => $request->username,
            'comment' => $request->comment,
        ]);

        $post->comments()->save($comment);

        if ($request->ajax()) {
            return response()->json($comment, 201);
        }

        return redirect()->route('content.show', $post);
    }
}
