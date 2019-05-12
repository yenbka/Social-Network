<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table = "posts";

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function comment() {
        return $this->hasMany('App\Comments', 'post_id', 'id');
    }

    public function media() {
        return $this->hasMany('App\Medias', 'post_id', 'id');
    }

    public function likes() {
        return $this->hasMany('App\Likes', 'post_id', 'id');
    }
}
