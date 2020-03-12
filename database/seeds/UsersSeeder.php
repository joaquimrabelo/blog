<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        //insere um usuário admin padrão

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@blog.com';
        $user->password = bcrypt('admin');
        $user->save();

        //insere o admin no grupo Administrador
        DB::table('group_user')->insert(['user_id' => $user->id, 'group_id' => 1]);
    }
}
