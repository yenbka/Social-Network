<?php

namespace App\Http\Controllers;
use App\Hobbie;
use App\Profile;
use App\User;
use App\messages;
use App\Friend;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function index(){
        $user = Auth::user();
        $profile = Profile::where('id', $user->profile_id)->first();
        $hobbies = Hobbie::where('id', $user->hobbies_id)->first();
        $listUser = User::with("profile")->where('id','!=',Auth::user()->id)->get();
        $listMess = messages::distinct()->with('profile')->with('user')->where('to',Auth::user()->id)->where('read_date',NULL)->get();
        // son bong add
        $id_friends = Friend::where('user_id_1', Auth::id())->where('allow', 0)->get();
        $friends = array();
        // $profile_friends = array();
        foreach($id_friends as $id_friend) {
            $friends[] = User::find($id_friend->user_id_2);
            // $profile_friends[] = Profile::find($id_friend->user_id_2);
        }
        // end son bong add
        return view('change-password', ['user' => $user, 'hobbies' => $hobbies, 'profile'=>$profile, 'listUser' => $listUser, 'listMess' => $listMess, 'friends'=>$friends]);
    }
}
