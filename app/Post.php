<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $guared = [];
    protected $fillable = ['title', 'body', 'image_path'];
}
