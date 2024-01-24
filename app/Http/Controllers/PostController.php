<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request([
                    'search',
                    'category',
                    'author'
                ]))
                ->paginate(6)
                ->withQueryString(),
        ]);
    }
    public function show(Post $post): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
//        dd(request());
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
//        dd($attributes);

        $post = Post::create($attributes);
            return redirect("/posts/{$post->slug}");
    }
}
