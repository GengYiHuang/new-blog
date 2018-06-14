<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['uid', 'pid', 'content', 'response'];

    public function user()
    {
        return $this->belongsTo('App\Entities\User', 'uid', 'id');
    }
}
