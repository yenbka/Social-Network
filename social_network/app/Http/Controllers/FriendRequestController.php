<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Auth;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function secure($id){
        $user = User::where('id', $id)->first();

        if ($user){
            $is_my_profile = (Auth::id() == $id)?true:false;
            if (!$is_my_profile){
                return false;
            }
            return true;
        }
        return false;
    }
    public function index($id){
        $user = Auth::user();
        $profile = Profile::where('id', $user->id)->first();
        return view('friend_requests', ['user' => $user, 'profile' => $profile]);
    }
}
