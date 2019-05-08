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
    	return $this->hasMany('App\messages','from','id');
    }

    public function messagesTo(){
    	return $this->hasMany('App\messages','to','id');
    }

    public function profile(){
    	return $this->hasOne('App\Profile',"id","id");

    }

    public function hobbies(){
    	return $this->hasOne('App\Hobbie','id','id');
    }

    public function posts(){
    	return $this->hasMany('App\Posts','user_id','id');
    }

    public function likes(){
        return $this->hasMany('App\likes','user_id','id');
    }
}
