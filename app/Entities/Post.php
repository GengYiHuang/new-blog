<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $guared = [];
    protected $fillable = ['uid' ,'title', 'body', 'image_path'];
    
    public function user()
    {
        return $this->belongsTo('App\Entities\User', 'uid', 'id');
    }
}