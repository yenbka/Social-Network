<?php

namespace App\Http\Controllers;

use App\Hobbie;
use App\Profile;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

//    public function index($id) {
//        if (!$this->secure($id)) return redirect('/404');
//        $user = User::where('id', $id)->first();
//        $hobbies_info = Hobbie::where('id', $user->hobbies_id)->first();
//        return $hobbies_info;
//    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'hobbie'=>'max:255',
            'movies'=>'max:255',
            'books'=>'max:255',
            'other'=>'max:255'
        ]);
    }

    protected function update(array $data, $user_id) {
        $id = User::where('id', $user_id)->first()->hobbies_id;
        Hobbie::where('id', $id)->first()->update([
            'hobbie'=>$data['hobbie'],
            'movies'=>$data['movies'],
            'books'=>$data['books'],
            'other'=>$data['other']
        ]);
    }

    public function get_hobbies_update_info() {
        $user = Auth::user();
        $profile = Profile::where('id', $user->profile_id)->first();
        $hobbies = Hobbie::where('id', $user->hobbies_id)->first();
        return view('hobbies_update_info', ['user' => $user, 'hobbies' => $hobbies, 'profile'=>$profile]);
    }

    public function hobbies_update_info(Request $request, $id) {
        $allRequest  = $request->all();
        $validator = $this->validator($allRequest);
        $user = Auth::user();
        $profile = Profile::where('id', $user->profile_id)->first();
        $hobbies = Hobbie::where('id', $user->hobbies_id)->first();
        if ($validator->fails()) {
            return view('hobbies_update_info', ['user'=>$user, 'hobbies'=>Hobbie::find($hobbies->id), 'profile'=>$profile])->withErrors($validator)->withInput();
        }
        else {
            $this->update($allRequest, $user->id);
            $status = "Cập nhật thông tin cá nhân thành công!";
            return view('hobbies_update_info', ['user'=>$user, 'hobbies'=>Hobbie::find($hobbies->id), 'profile'=>$profile, 'status'=>$status]);
        }
    }


}
