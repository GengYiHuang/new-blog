<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['uid', 'send_to', 'title', 'content', 'read'];
}
