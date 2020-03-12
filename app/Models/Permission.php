<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'permission_group');
    }
}
