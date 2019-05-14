<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Hobbie;
use App\Profile;
use App\User;
use Auth;
use App\messages;
use App\Posts;
use App\Medias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;

class HomeController extends Controller
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
        return view('newsfeed', []);
    }

    public function getSearchResult(Request $request, $id) {
        $search = $request->input('search');
        if (empty($search)) return redirect()->back();

        $user_result = User::where('first_name', 'like', '%'.$search.'%')->orWhere('last_name', 'like', '%'.$search.'%')->orderBy('first_name', 'ASC')->get();
        $profile_result = array();
        $relationship_result = array();
        foreach ($user_result as $user_temp) {
            $profile_result[] = Profile::find($user_temp->profile_id);
            $is_friend = Friend::where('user_id_1', Auth::id())->where('user_id_2', $user_temp->id)->first();
            if ($is_friend != null) {
                if ($is_friend->allow == 0) {
                    $relationship_result[] = 1;
                }
                elseif ($is_friend->allow == 1) {
                    $relationship_result[] = -2;
                }
                continue;
            }
            $is_friend = Friend::where('user_id_1', $user_temp->id)->where('user_id_2', Auth::id())->first();
            if ($is_friend != null) {
                if ($is_friend->allow == 0) {
                    $relationship_result[] = -1;
                }
                elseif ($is_friend->allow == 1) {
                    $relationship_result[] = -2;
                }
                continue;
            }
            if ($user_temp->id == Auth::id()) {
                $relationship_result[] = 2;
                continue;
            }
            $relationship_result[] = 0;
        }
        $ret = ['user_result'=>$user_result, 'profile_result'=>$profile_result, 'search'=>$search, 'relationship_result'=>$relationship_result];
        return $ret;
    }
	
	public function search(Request $request, $id) {
        $result = $this->getSearchResult($request, $id);
        return view('search_result', $result);
    }
}
