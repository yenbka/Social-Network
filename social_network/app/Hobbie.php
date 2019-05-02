<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    protected $table = 'hobbies';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'hobbie',
        'movies',
        'books',
        'other',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
