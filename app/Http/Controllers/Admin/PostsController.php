<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\Post;


class PostsController extends Controller
{
    public function index(){

        // exibir todos os posts por ordem de criação e publicação
        $posts = Post::orderBy('created_at', 'desc')
            ->orderBy('published', 'desc')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store( Request $request ){
        // dd($request->all());
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->published = $request->published;
        $post->slug = Str::slug($request->title, '-');
        $save = $post->save();

        // redirecionar para a pagina de posts com uma mensagem de sucesso
        if($save){
            return redirect()->route('admin.posts.index')->with('success', 'Post criado com sucesso!');
        }else{
            return redirect()->route('admin.posts.index')->with('error', 'Erro ao criar post!');
        }
    }


}
