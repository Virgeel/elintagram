<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    protected $fillable = [
        'userId',
        'photo',
        'caption',
        'datetime',
        'likecount',
        'commentcount',
    ];
    
    public function user(){
        return $this->belongsTo('App\Models\User','userId','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like');
    }
}
