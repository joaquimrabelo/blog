<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;

class PerfilController extends Controller
{
    public function __construct()
    {
        view()->share('menuAtivo', 'home');
    }
    public function edit()
    {
        $user = auth()->user();
        return view('painel.pages.perfil.form', compact('user'));
    }

    public function store(StoreUser $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $msg = ['type' => 'danger', 'msg' => 'Não foi possível salvar os dados!'];
        if($user->save()) {
            $msg = ['type' => 'success', 'msg' => 'O usuário foi salvo com sucesso!'];
        }

        return redirect('/painel/home')->with('status_message', $msg);
    }
}
