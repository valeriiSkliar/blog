<?php

namespace App\Http\Controllers;

use App\Models\Post;

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
}
