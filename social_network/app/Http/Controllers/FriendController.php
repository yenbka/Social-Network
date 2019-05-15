<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Friend;
use App\messages;
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
        return view('friend', []);
    }

    public static function getFriendList($id) {
        $friends = array();
        $profile_friends = array();

        $id_friends = Friend::where('user_id_1', $id)->where('allow', 1)->get();
        foreach($id_friends as $id_friend) {
            $friends[] = User::find($id_friend->user_id_2);
            $profile_friends[] = Profile::find($id_friend->user_id_2);
        }

        $id_friends = Friend::where('user_id_2', $id)->where('allow', 1)->get();
        foreach($id_friends as $id_friend) {
            $friends[] = User::find($id_friend->user_id_1);
            $profile_friends[] = Profile::find($id_friend->user_id_1);
        }

        return [$friends, $profile_friends];
    }

    public static function getFriendRequest($id) {
        $id_friends = Friend::where('user_id_1', $id)->where('allow', 0)->get();
        $friends = array();
        $profile_friends = array();
        foreach($id_friends as $id_friend) {
            $friends[] = User::find($id_friend->user_id_2);
            $profile_friends[] = Profile::find($id_friend->user_id_2);
        }
        return [$friends, $profile_friends];
    }

    public function send_request(Request $request){
        $response = array();
        $response['code'] = 400;

        $user_id_2 = $request->input('request_id');

        $relation = new Friend();
        $relation->user_id_1 = $user_id_2;
        $relation->user_id_2 = Auth::id();
        $relation->allow = 0;

        if ($relation->save()) {
            $response['code'] = 200;
        }

        return Response::json($response);
    }

    public function get_request($id){
        return view('friend_requests', []);
    }

    public function process_request(Request $request){
        $response = array();
        $response['code'] = 400;

        $is_accept = $request->input('is_accept');
        $request_id = $request->input('request_id');

        $request_friend = Friend::where('user_id_1', Auth::id())->where('user_id_2', $request_id)->first();

        if ($request_friend){
            if ($is_accept == 0){
                if ($request_friend->delete()) {
                    $response['code'] = 200;
                }
            } else {
                $request_friend->allow = 1;
                if ($request_friend->save()) {
                    $response['code'] = 200;
                }
            }
        }
        return Response::json($response);
    }
    public function unfriend(Request $request){
        $response = array();
        $response['code'] = 400;

        $id_friend = $request->input('id_friend');
        $id_user = Auth::id();
        $relation = Friend::where('user_id_1', $id_user)->where('user_id_2', $id_friend);
        $relation = Friend::where('user_id_2', $id_user)->where('user_id_1', $id_friend)->union($relation)->first();

        if ($relation){
            if ($relation->delete()){
                $response['code'] = 200;
            }
        }

        $id_friends = Friend::where('user_id_1', $id_user)->where('allow', 1);
        $id_friends = Friend::where('user_id_2', $id_user)->where('allow', 1)->union($id_friends);
        $response['no_friends'] = $id_friends->count();

        return Response::json($response);
    }
}
