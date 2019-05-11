<?php
namespace App\Http\Controllers\Auth;
use App\Hobbie;
use App\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'firstname.required' => 'Trường bắt buộc',
            'lastname.required' => 'Trường bắt buộc',
            'registerEmail.required' => 'Email là trường bắt buộc',
            'registerEmail.email' => 'Email không đúng định dạng',
            'registerPassword.required' => 'Mật khẩu là trường bắt buộc',
            'registerPassword.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'registerEmail' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'registerPassword' => ['required', 'string', 'min:6'],
        ],$messages);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'email' => $data['registerEmail'],
            'password' => bcrypt($data['registerPassword']),
            'profile_id' => $this->generateProfileID($data),
            'hobbies_id' =>  $this->generateHobbiesID($data),
            'remember_token' => 1
        ]);
    }
    protected function generateProfileID($data) {
        $gender = $data['gender']=="MA"?0:1;
        $profile = Profile::create([
            'about_me'=>null,
            'birth_date'=>Carbon::parse($data['datetimepicker']),
            'address'=>null,
            'gender'=>$gender,
            'phone'=>null,
            'status'=>0,
            'avatar_path'=>'img/author-main1.jpg',
            'header_path'=>'img/top-header3.png'
        ]);
        return $profile->id;
    }
    protected function generateHobbiesID($data) {
        $hobbies = Hobbie::create([
            'hobbie'=>'',
            'movies'=>'',
            'books'=>'',
            'other'=>'',
        ]);
        return $hobbies->id;
    }
    public function register(Request $request){
        $validator =$this->validator($request->all());
        if($validator -> fails()){
            return  redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $user = $this->create($request->all());
            if(Auth::attempt(['email'=>$request->input('registerEmail'),'password'=>$request->input('registerPassword')])){
                return redirect()->route('home');
            }else{
                $errors = new MessageBag(['errorlogin'=>'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }
}