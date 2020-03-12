<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'group_user');
    }

    public function hasPermission(Permission $permission, $any)
    {
        foreach ($permission->groups as $group) {
            if ($any && isset($any->user_id)) {
                if($this->groups->contains('nome', $group->nome) && $this->id == $any->user_id){
                    return true;
                }
            } else {
                if($this->groups->contains('nome', $group->nome)){
                    return true;
                }
            }
        }
        return false;
    }
}
