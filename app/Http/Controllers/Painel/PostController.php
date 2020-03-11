<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

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
        $posts = Post::orderby('created_at', 'desc')->paginate(30);
        return view('painel.pages.posts.index', compact('posts'));
    }
}
