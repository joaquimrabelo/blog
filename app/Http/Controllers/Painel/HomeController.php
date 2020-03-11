<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $arrStatus = [0 => 'Rascunho', 1 => 'Publicado'];
        view()->share('arrStatus', $arrStatus);

        view()->share('menuAtivo', 'home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPosts = Post::count();
        $posts = Post::orderby('created_at', 'desc')->limit(5)->get();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        return view('painel.pages.home', compact('totalPosts', 'totalCategories', 'totalUsers', 'posts'));
    }
}
