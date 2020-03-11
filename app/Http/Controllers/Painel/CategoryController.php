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

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect('/painel/categories');
        }
        return view('painel.pages.categories.form', compact('category'));
    }

    public function create()
    {
        return view('painel.pages.categories.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|unique:categories'
        ];
        if ($request->id) {
            $rules = [
                'nome' => 'required|unique:categories,nome,' . $request->id
            ];
        }
        $validatedData = $request->validate($rules);

        $category = new Category();
        if ($request->id) {
            $category = Category::find($request->id);
        }
        $category->nome = $request->nome;
        $category->slug = str_slug($request->nome);
        $msg = ['type' => 'danger', 'msg' => 'Não foi possível salvar os dados!'];
        if($category->save()) {
            $msg = ['type' => 'success', 'msg' => 'A categoria foi salva com sucesso!'];
        }

        return redirect('/painel/categories')->with('status_message', $msg);
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        $msg = ['type' => 'danger', 'msg' => 'Não foi possível deletar a categoria!'];
        if ($category && $category->delete()) {
            $msg = ['type' => 'success', 'msg' => 'Categoria deletada com sucesso!'];
        }

        return redirect('/painel/categories')->with('status_message', $msg);
    }
}
