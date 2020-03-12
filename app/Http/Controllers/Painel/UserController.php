<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    public function __construct()
    {
        $arrGroups = Group::orderby('nome', 'asc')->get();
        view()->share('arrGroups', $arrGroups);
        view()->share('menuAtivo', 'config');
    }

    public function index()
    {
        $this->authorize('view-user');
        $users = User::paginate(30);
        return view('painel.pages.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('/painel/users');
        }
        $this->authorize('edit-user', $user);
        return view('painel.pages.users.form', compact('user'));
    }

    public function create()
    {
        $this->authorize('edit-user');
        return view('painel.pages.users.form');
    }

    public function store(StoreUser $request)
    {
        $user = new User();
        if ($request->id) {
            $user = User::find($request->id);
            $this->authorize('edit-user', $user);
        } else {
            $this->authorize('edit-user');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $msg = ['type' => 'danger', 'msg' => 'Não foi possível salvar os dados!'];
        if($user->save()) {
            $groups = $request->groups;
            $user->groups()->sync($groups);
            $msg = ['type' => 'success', 'msg' => 'O usuário foi salvo com sucesso!'];
        }

        return redirect('/painel/users')->with('status_message', $msg);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $this->authorize('delete-user', $user);
        if ($user->id == auth()->user()->id) {
            $msg = ['type' => 'warning', 'msg' => 'Você não pode deletar o seu próprio usuário!'];
            return redirect('/painel/users')->with('status_message', $msg);
        }
        $msg = ['type' => 'danger', 'msg' => 'Não foi possível deletar a categoria!'];
        if ($user && $user->delete()) {
            $msg = ['type' => 'success', 'msg' => 'Categoria deletada com sucesso!'];
        }

        return redirect('/painel/users')->with('status_message', $msg);
    }
}
