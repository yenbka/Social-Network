<?php

namespace App\Http\Controllers;

use App\Hobbie;
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
        $profile = Profile::where('id', $user->profile_id)->first();
        $hobbies = Hobbie::where('id', $user->hobbies_id)->first();

        return view('profile', ['profile'=>$profile, 'user'=>$user,  'hobbies'=>$hobbies]);
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
        $status = $data['status']=="Married"?1:0;
        Profile::where('id', $user->profile_id)->update([
            'about_me' => $data['about_me'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'gender' => $gender,
            'phone' => $data['phone'],
             'status' => $status,
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

    public function update_avatar(Request $request, $id) {
        $messages = [
            'avatar.required' => trans('validation.required'),
            'avatar.mimes' => trans('validation.mimes'),
            'avatar.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(['avatar' => $request->file('avatar')], [
            'avatar' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->route('profile', ['user' => Auth::user()])->withErrors($validator)->withInput();
        }
        else {
            $image = $request->file('avatar');
            // $img = Image::make($img)->resize(36,36);
            $file_name = md5(uniqid() . time()) . '.' . $image->getClientOriginalExtension();
            if ($image->storeAs('img/avatar', $file_name)) {
                $user = User::where('id', $id)->first();
                $profile = Profile::find($user->profile_id);
                $profile->avatar_path = 'img/avatar/'.$file_name;
                $profile->save();
                return redirect()->route('profile', ['id' => Auth::id(), 'status' => 'Success']);
            }
            else {
                return redirect()->route('profile', ['id' => Auth::id(), 'status' => 'Failed']);
            }
        }
    }

    public function update_header(Request $request, $id) {
        $messages = [
            'header.required' => trans('validation.required'),
            'header.mimes' => trans('validation.mimes'),
            'header.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(['header' => $request->file('header')], [
            'header' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->route('profile', ['user' => Auth::user()])->withErrors($validator)->withInput();
        }
        else {
            $image = $request->file('header');
            // $img = Image::make($img)->resize(36,36);
            $file_name = md5(uniqid() . time()) . '.' . $image->getClientOriginalExtension();
            if ($image->storeAs('img/header', $file_name)) {
                $user = User::where('id', $id)->first();
                $profile = Profile::find($user->profile_id);
                $profile->header_path = 'img/header/'.$file_name;
                $profile->save();
                return redirect()->route('profile', ['id' => Auth::id(), 'status' => 'Success']);
            }
            else {
                return redirect()->route('profile', ['id' => Auth::id(), 'status' => 'Failed']);
            }
        }
    }
}
