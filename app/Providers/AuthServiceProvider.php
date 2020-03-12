<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = [];
        try {
            $permissions = Permission::with('groups')->get();
        } catch (\Throwable $th) {}

        foreach ($permissions as $permission ) {
            Gate::define($permission->nome, function($user, $any = false) use ($permission) {
                return $user->hasPermission($permission, $any);
            });
        }

        Gate::before(function($user) {
            if ($user->groups->contains('nome', 'Administrador')) {
                return true;
            }
        });      
    }
}
