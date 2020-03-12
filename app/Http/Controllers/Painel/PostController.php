<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    public function __construct()
    {
        $arrStatus = [0 => 'Rascunho', 1 => 'Publicado'];
        view()->share('arrStatus', $arrStatus);

        view()->share('menuAtivo', 'posts');
    }
    public function index()
    {
        $this->authorize('view-post');
        $posts = Post::orderby('created_at', 'desc')->paginate(30);
        return view('painel.pages.posts.index', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/painel/posts');
        }
        $this->authorize('edit-post', $post);
        return view('painel.pages.posts.form', compact('post'));
    }

    public function create()
    {
        $this->authorize('edit-post');
        return view('painel.pages.posts.form');
    }

    public function store(StorePost $request)
    {
        $post = new Post();
        if ($request->id) {
            $post = Post::find($request->id);
            $this->authorize('edit-post', $post);
        } else {
            $this->authorize('edit-post');
        }
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->resumo = $request->resumo;
        $post->texto = $request->texto;
        $post->status = $request->status;
        $post->user_id = auth()->user()->id;

        if ($request->hasFile('imagem')) {
            //deleta imagem atual, se existir
            if (!empty($post->imagem)) {
                \Storage::delete('posts/' . $post->imagem);
            }
            $img = $request->file('imagem');
            $nome = $img->getClientOriginalName();
            $extensao = $img->getClientOriginalExtension();
            $aux = substr(md5(time()), 0, 6);
            $nome_unico = str_slug(str_replace('.' . $extensao, '', $nome)) . '-' . $aux . '.' . $extensao;
            $img->storeAs('posts', $nome_unico);
            
            $post->imagem = $nome_unico;
        }
        
        $msg = ['type' => 'danger', 'msg' => 'Não foi possível salvar os dados!'];
        if($post->save()) {
            $msg = ['type' => 'success', 'msg' => 'O post foi salvo com sucesso!'];
        }

        return redirect('/painel/posts')->with('status_message', $msg);
    }

    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        $this->authorize('delete-post', $post);
        $msg = ['type' => 'danger', 'msg' => 'Não foi possível deletar a categoria!'];
        if ($post && $post->delete()) {
            $msg = ['type' => 'success', 'msg' => 'Categoria deletada com sucesso!'];
        }

        return redirect('/painel/posts')->with('status_message', $msg);
    }
}
