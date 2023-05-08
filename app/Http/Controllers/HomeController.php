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

    public function index(){
        // $posts = Post::latest()->take(5)->get();
         // $posts = Post::latest()->paginate(5);
        //  $posts = Post::all();
       //$posts = Post::where('published', true)->latest()->paginate(5);
     $posts = Post::where('published', true)->paginate(5);


        return view('posts.index', compact('posts'));
    }

    public function show($post)
    {
        $post = Post::where('slug', $post)->firstOrFail();

        return view('posts.post', compact('post')); //[ 'post' => $post];
    }
}
