<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        view()->share('menuAtivo', 'categories');
    }

    public function index()
    {
        $categories = Category::orderby('created_at', 'desc')->paginate(30);
        return view('painel.pages.categories.index', compact('categories'));
    }
}
