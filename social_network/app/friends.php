<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friends extends Model
{
    //
    protected $table = 'friends';
    public $timestamps = false;

    public function users(){
    	return $this->belongstoMany('App\users');
    }
}
