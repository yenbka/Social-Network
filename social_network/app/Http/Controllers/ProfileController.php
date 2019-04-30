<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Profile;
use Illuminate\Support\Facades\Validator;

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
        $user = User::where('id', $id)->first();
        $profile_info = Profile::where('id', $user->profile_id)->first();
        return view('profile', ['profile_info'=>$profile_info, 'user'=>$user]);
    }

    public function get_profile_update_info($id){
        $user = Auth::user();
        $profile = Profile::where('id', $user->id)->first();
        return view('profile_update_info', ['user' => $user, 'profile' => $profile]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function update(array $data, $id) {
        $user = User::where('id', $id)->first();

        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);
        $gender = $data['gender']=="MA"?0:1;
        Profile::where('id', $user->profile_id)->update([
            'about_me' => $data['about_me'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'gender' => $gender,
            'phone' => $data['phone'],
            // 'status' => $data['status'],
        ]);
    }

    public function profile_update_info(Request $request, $id){
        $allRequest  = $request->all();	
        $validator = $this->validator($allRequest);
        if ($validator->fails()) {
            // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return view('profile_update_info', ['user' => Auth::user(), 'profile' => Profile::find($id)])->withErrors($validator)->withInput();
        } else {   
            // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
            $this->update($allRequest, $id);
            // Insert thành công sẽ hiển thị thông báo
            $status = "Cập nhật thông tin cá nhân thành công!";
            return view('profile_update_info', ['user' => Auth::user(), 'profile' => Profile::find($id), 'status' => $status]);
        }
    }
}
