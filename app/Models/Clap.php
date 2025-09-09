<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clap extends Model
{
    protected $fillable = ['user_id', 'userpost_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userpost()
    {
        return $this->belongsTo(UserPost::class, 'userpost_id');
    }
}
