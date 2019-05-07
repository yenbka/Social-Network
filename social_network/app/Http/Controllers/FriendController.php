<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Friend;
use Auth;
use Illuminate\Http\Request;
use Response;

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
        $user = User::where('id', $id)->first();
        $profile = Profile::where('id', $user->profile_id)->first();
        $friends = Friend::where('user_id_1', $id)->orWhere('user_id_2', $id)->get();
        return view('friend', ['profile'=>$profile, 'user'=>$user, 'friends'=>$friends]);
    }

    public function send_request(Request $request){
        $response = array();
        $response['code'] = 400;

        $user_id_2 = $request->input('request_id');

        $relation = new Friend();
        $relation->user_id_1 = Auth::id();
        $relation->user_id_2 = $user_id_2;
        $relation->allow = 0;

        if ($relation->save()) {
            $response['code'] = 200;
        }

    return Response::json($response);
    }

    public function get_request($id){
        $user = Auth::user();
        $profile = Profile::where('id', $user->id)->first();
        $id_friends = Friend::where('user_id_1', $user->id)->where('allow', 0)->get();
        $friends = array();
        $profile_friends = array();
        foreach($id_friends as $id_friend) {
            $friends[] = User::find($id_friend->user_id_2);
            $profile_friends[] = Profile::find($id_friend->user_id_2);
        }
        return view('friend_requests', ['user' => $user, 'profile' => $profile, 'friends' => $friends, 'profile_friends' => $profile_friends]);
    }
}
