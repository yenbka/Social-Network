<?php

namespace App\Http\Controllers;

use App\Hobbie;
use App\User;
use Illuminate\Http\Request;

class HobbieController extends Controller
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
        $hobbies_info = Hobbie::where('id', $user->hobbies_id)->first();
//        return view('profile', ['profile_info'=>$hobbies_info]);
        return $hobbies_info;
    }
}
