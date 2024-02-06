<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::where('user_id', '=', auth()->user()->id)->paginate(6)
        ]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
//            'user_id' => ['required', Rule::exists('users', 'id')],
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail', ['disk' => 'public']);

        $post = Post::create($attributes);
        return redirect("/posts/{$post->slug}");
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post'=>$post]);
    }
    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        if (request()->file('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail', ['disk' => 'public']);
        }

        $post->update($attributes);
        return back()->with(['success' => 'Post updated']);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with(['success' => 'Post deleted']);
    }
}
