<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Group;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_group')->delete();
        DB::table('permissions')->delete();
        DB::table('group_user')->delete();
        DB::table('groups')->delete();

        $permissions = config('permissions.regras');

        foreach ($permissions as $id => $value) {
            $permission = new Permission();
            $permission->id = $id;
            $permission->nome = $value['nome'];
            $permission->descricao = $value['desc'];
            $permission->save();
        }

        $groups = config('permissions.groups');
        foreach ($groups as $id => $value) {
            $group = new Group();
            $group->id = $id;
            $group->nome = $value['nome'];
            $group->descricao = $value['desc'];
            $group->save();
        }
    }
}
