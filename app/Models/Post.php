<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function autor()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
