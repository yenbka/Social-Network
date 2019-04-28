<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Profile;

class ProfileController extends Controller
{
    //
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
        $profile_info = Profile::where('id', $id)->first();
        return view('profile', ['profile_info'=>$profile_info]);
    }

    public function get_profile_save_info($id){
        $user = Auth::user();
        $profile = Profile::where('id', $user->id)->first();
        return view('profile_save_info', ['user' => $user, 'profile' => $profile]);
    }
}
