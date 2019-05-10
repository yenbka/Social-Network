<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'user_id_1',
        'user_id_2',
        'allow'
    ];
    public function users(){
    	return $this->belongstoMany('App\users');
    }
}
