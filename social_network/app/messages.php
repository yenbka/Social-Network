<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    //
     protected $table = 'messages';
    public $timestamps = false;

    public function toUsers(){
    	return $this->belongstoMany('App\users');
    }

    public function fromUser(){
    	return $this->belongsto('App\users');
    }
}
