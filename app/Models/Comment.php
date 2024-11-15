<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
        'created_at'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
