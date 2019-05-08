<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    //
    protected $table = 'messages';
    protected $fillable = ['from','to','content','send_date','read_date'];
    public $timestamps = false;

    public function toUsers(){
    	return $this->belongstoMany('App\User');
    }

    public function fromUser(){
    	return $this->belongsto('App\User');
    }
    public function profile(){
    	return $this->hasOne('App\Profile',"id","from");
    }
    public function user(){
    	return $this->hasOne('App\User',"id","from");
    }
}
