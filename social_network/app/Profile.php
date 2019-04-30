<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'about_me', 
        'birth_date',
        'address',
        'gender',
        'phone',
        'status',
        'avatar_path',
        'header_path'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
