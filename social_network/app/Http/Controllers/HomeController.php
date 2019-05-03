<?php

namespace App\Http\Controllers;

use App\Hobbie;
use App\Profile;
use App\User;
use Auth;
use Illuminate\Http\Request;

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
        $user = User::where('id', $id)->first();
        $profile = Profile::where('id', $user->profile_id)->first();
        $hobbies = Hobbie::where('id', $user->hobbies_id)->first();
        return view('newsfeed', ['profile'=>$profile, 'user'=>$user, 'hobbies'=>$hobbies]);
    }

    public function search(Request $request) {
        $search = $request->input('search');
        if (empty($search)) return redirect()->back();

        $user = Auth::user();

        $users = User::where('first_name', 'like', '%'.$search.'%')->orWhere('last_name', 'like', '%'.$search.'%')->orderBy('first_name', 'ASC')->get();

        return view('search_result', ['users', 'user']);

    }
}
