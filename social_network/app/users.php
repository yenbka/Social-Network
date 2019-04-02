<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
     protected $table = 'users';
    public $timestamps = false;

    public function friends{
    	return $this->belongstoMany('App\friends');
    }

    public function messagesFrom{
    	return $this->hasMany('App\messages');
    }

    public function messagesTo{
    	return $this->hasMany('App\messages');
    }

    public function profile{
    	return $this->hasOne('App\profiles');
    }

    public function hobbies{
    	return $this->hasOne('App\hobbies');
    }

    public function posts{
    	return $this->hasMany('App\posts');
    }
}
