<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'permission_group');
    }
}
