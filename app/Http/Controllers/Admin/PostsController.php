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
      // mass assignment - atribuição em massa
       $data = $request->all();
       $data['slug'] = Str::slug($request->title, '-');

        Post::create($data);

        // redirecionar para a pagina de posts com uma mensagem de sucesso
        return redirect()->route('admin.posts.index')->with('success', 'Post criado com sucesso!');

        // redirecionar para a pagina de posts com uma mensagem de erro
         return redirect()->route('admin.posts.index')->with('error', 'Erro ao criar post!');

    }



public function edit($id)
{
    // buscar o post pelo id
    $post = Post::findOrFail($id);

    // retornar a view com o formulário de edição
    return view('admin.posts.edit', compact('post'));
}




    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'body' => 'required',
            'published' => 'required|boolean',
        ]);

        $post = Post::find($id);
        if ($post) {
            $post->update($validatedData);
            return redirect()->route('admin.posts.index', ['post' => $post->id])->with('success', 'Post atualizado com sucesso!');
        } else {
            return redirect()->route('admin.posts.index')->with('error', 'Post não encontrado!');
        }
    }


}
