<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    protected $table = 'hobbies';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
