<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Auth;
use App\messages;
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
        $listUser = User::with("profile")->where('id','!=',Auth::user()->id)->get();
        $listMess = messages::distinct()->with('profile')->with('user')->where('to',Auth::user()->id)->where('read_date','0000-00-00')->get();
        $user = Auth::user();
        $profile = Profile::where('id', $user->id)->first();
        return view('friend_requests', ['user' => $user, 'profile' => $profile, 'listuser'=>$listUser,'listMess'=>$listMess]);
    }
}
