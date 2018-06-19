<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['uid', 'send_to', 'title', 'content', 'read'];

    public function user()
    {
        return $this->belongsTo('App\Entities\User', 'uid', 'id');
    }
}
