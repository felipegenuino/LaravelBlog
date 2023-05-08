<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\Support\Renderable;

use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function show($post)
    {
        $post = Post::where('slug', $post)->firstOrFail();

        return view('posts.post', compact('post')); //[ 'post' => $post];
    }
}
