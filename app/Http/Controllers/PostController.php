<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function post(){
        return view('content.post');
    }

    public function postindex(){
        $posts = Post::all();
        return view('content.postindex', compact('posts'));
    }

    public function create(){
        return view('content.create');
    }

    public function store(Request $request ){
        $request->validate([
            'username' => 'required',
            'image' => 'required|image|max:2048',
            'caption' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'username' => $request->username,
            'location' => $request->location,
            'image_path' => $imagePath,
            'caption' => $request->caption,
        ]);
        return redirect()->route('content.postindex')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        // $posts=Post::find($id);
        return view('content.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // $posts=Post::find($id);
        return view('content.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'username' => 'required',
            'image' => 'nullable|image|max:2048',
            'caption' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image_path = $imagePath;
        }

        $post->username = $request->username;
        $post->location = $request->location;
        $post->caption = $request->caption;
        $post->save();

        return redirect()->route('content.postindex')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('content.postindex')->with('success', 'Post deleted successfully.');
    }
}


