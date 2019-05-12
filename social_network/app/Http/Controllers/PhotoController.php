<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Medias;
use App\Profile;
use App\User;
use App\messages;
use Auth;
use Illuminate\Http\Request;

class PhotoController extends Controller
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
        $listUser = User::with("profile")->where('id','!=',Auth::user()->id)->get();
        $listMess = messages::distinct()->with('profile')->with('user')->where('to',Auth::user()->id)->where('read_date',NULL)->get();
        $user = User::where('id', $id)->first();
        $profile = Profile::where('id', $user->profile_id)->first();
        $photos = Medias::where('user_id', $id)->Where('type', 1)->get();
        return view('photo', ['profile'=>$profile, 'user'=>$user, 'photos'=>$photos,'listUser'=>$listUser,'listMess'=>$listMess]);
    }
}
