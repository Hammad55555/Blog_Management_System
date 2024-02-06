<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostFormController extends Controller
{
        public function edit(Post $post)
    {
        return view('blog.edit', compact('post'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string',
        ]);

        $post= Post::create($request->all());

        return redirect('/posts')->with('success', 'Post created successfully');
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
           'author' => 'required|string',
        ]);

        $post->update($request->all());

        return redirect('/posts')->with('success', 'Post updated successfully');
    }
}
