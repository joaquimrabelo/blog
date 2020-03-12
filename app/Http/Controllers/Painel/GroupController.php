<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Permission;

class GroupController extends Controller
{
    public function __construct()
    {
        $permissions = Permission::all();
        view()->share('arrPermissions', $permissions);
        view()->share('menuAtivo', 'config');
    }

    public function index()
    {
        $this->authorize('view-groups');
        $groups = Group::paginate(30);
        return view('painel.pages.groups.index', compact('groups'));
    }

    public function edit($id)
    {
        $group = Group::find($id);
        if (!$group) {
            return redirect('/painel/groups');
        }
        $this->authorize('edit-group', $group);
        return view('painel.pages.groups.form', compact('group'));
    }

    public function create()
    {
        $this->authorize('edit-group');
        return view('painel.pages.groups.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|unique:groups',
            'descricao' => 'required'
        ];
        if ($request->id) {
            $rules['nome'] = 'required|unique:groups,nome,' . $request->id;
        }
        $validatedData = $request->validate($rules);

        $group = new Group();
        if ($request->id) {
            $group = Group::find($request->id);
            $this->authorize('edit-group', $group);
        } else {
            $this->authorize('edit-group');
        }
        $group->nome = $request->nome;
        $group->descricao = $request->descricao;
        $msg = ['type' => 'danger', 'msg' => 'Não foi possível salvar os dados!'];
        if($group->save()) {
            $permissions = $request->permissions;
            $group->permissions()->sync($permissions);
            $msg = ['type' => 'success', 'msg' => 'O grupo foi salvo com sucesso!'];
        }

        return redirect('/painel/groups')->with('status_message', $msg);
    }

    public function delete(Request $request)
    {
        $group = Group::find($request->id);
        $this->authorize('delete-group', $group);
        $msg = ['type' => 'danger', 'msg' => 'Não foi possível deletar a categoria!'];
        if ($group && $group->delete()) {
            $msg = ['type' => 'success', 'msg' => 'Categoria deletada com sucesso!'];
        }

        return redirect('/painel/groups')->with('status_message', $msg);
    }
}
