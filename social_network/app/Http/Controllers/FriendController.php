<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Friend;
use Auth;
use Illuminate\Http\Request;

class FriendController extends Controller
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
    public function index($id) {
        if (!$this->secure($id)) return redirect('/404');
        $listUser = User::with("profile")->get();
        $user = User::where('id', $id)->first();
        $profile = Profile::where('id', $user->profile_id)->first();
        $friends = Friend::where('user_id_1', $id)->orWhere('user_id_2', $id)->get();
        return view('friend', ['profile'=>$profile, 'user'=>$user, 'friends'=>$friends, 'listUser'=>$listUser]);
    }
}
