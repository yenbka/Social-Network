<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    //
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['first_name','last_name','email','password','profile_id','hobbies_id'];
    public function friends(){
    	return $this->belongstoMany('App\Friend');
    }

    public function messagesFrom(){
    	return $this->hasMany('App\messages');
    }

    public function messagesTo(){
    	return $this->hasMany('App\messages');
    }

    public function profile(){
    	return $this->hasOne('App\profiles');
    }

    public function hobbies(){
    	return $this->hasOne('App\hobbies');
    }

    public function posts(){
    	return $this->hasMany('App\posts');
    }
}
