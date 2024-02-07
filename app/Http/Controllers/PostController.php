<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('blog.show', ['post' => $post]);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = auth()->user()->id;

        // Assuming 'author' is a field in your 'posts' table
        $post->author = auth()->user()->name; // You may need to adjust this based on your user model

        $post->save();

        return response()->json([
            'message' => 'Create Post Successfully',
        ], 200);
    }



public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('blog.edit', ['post' => $post]);
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);
    $post = Post::findOrFail($id);
    $post->title = $validatedData['title'];
    $post->content = $validatedData['content'];
    $post->save();
    return redirect()->route('blog.index')->with('success', 'Post updated successfully');
}

public function destroy($id)
{
    $post = Post::findOrFail($id);
    $post->delete();
    return redirect()->route('blog.index')->with('success', 'Post deleted successfully');
}
}
