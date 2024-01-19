<?php

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    if (!View::exists("posts." . $slug)) {
        return redirect('/');
    }
    try {
        $postView = cache()
            ->remember(
                "posts." . $slug,
                now()->addDay(),
                fn() => view("posts." . $slug)->render());
    } catch (\Exception $e) {
        Log::error("Unable to cache the post: " . $e->getMessage());
        $postView = view("posts." . $slug);
    }

    return $postView;
})->where('post', '[A-z_\-]+');
