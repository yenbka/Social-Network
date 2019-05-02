<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    protected $table = 'friend_requests';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'sender',
        'receiver',
    ];
    
    public function users(){
        return $this->belongstoMany('App\users');
    }
}
