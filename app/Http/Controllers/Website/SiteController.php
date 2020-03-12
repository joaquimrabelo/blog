<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $categories = Category::orderby('nome', 'asc')->get();
        view()->share('categories', $categories);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->busca) {
            $busca = $request->busca;

            $posts = Post::where('status', 1)->where(function($query) use($busca) {
                $query->orWhere('title', 'like', '%' . $busca . '%');
                $query->orWhere('resumo', 'like', '%' . $busca . '%');
                $query->orWhere('texto', 'like', '%' . $busca . '%');
            })->paginate(10);
            return view('website.pages.home', compact('posts'));
        }
        $destaques = Post::where('status', 1)->orderby('created_at', 'desc')->limit(3)->get();
        $posts_destaques = [];
        foreach ($destaques as $post) {
            $posts_destaques[] = $post->id;
        }
        $posts = Post::where('status', 1)->whereNotIn('id', $posts_destaques)->orderby('created_at', 'desc')->paginate(10);
        return view('website.pages.home', compact('posts', 'destaques'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            return redirect(route('website-home'));
        }
        $posts = Post::select('posts.*')
            ->join('post_categorias', 'post_categorias.post_id', '=', 'posts.id')
            ->where('status', 1)
            ->where('post_categorias.category_id', $category->id)
            ->paginate(10);

        return view('website.pages.home', compact('category', 'posts'));
    }

    public function post($slug)
    {
        $post = Post::where('status', 1)->where('slug', $slug)->first();
        if(!$post) {
            return redirect(route('website-home'));
        }
        return view('website.pages.post', compact('post'));
    }
}
