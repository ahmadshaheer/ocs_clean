<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Hash;
use DB;
use Log;
use Session;

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
    protected $redirectTo = '/admin/users';

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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function show_register() {
        return view('admin.register');
    }
    protected function register() {
      
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password =Hash::make($_POST['password']);
        $password_confirmation =$_POST['password_confirmation'];
        if(Hash::check($password_confirmation,$password)) {
            $user = new User();
            $db = DB::table('users')->where('email',$email)->first();
            if($db==null) {
                // print_r($email.' exists ');exit;
                $user->name = $name;
                $user->email = $email;
                $user->password = $password;
                $user->role = $_POST['role'];
                $user->save();
                Log::info($user->email." created on ".date('l jS \of F Y h:i:s A'));
                return Redirect()->Route('users');
            }
            else {
              Log::info($user->email." user creation failed on ".date('l jS \of F Y h:i:s A'));
                Session::flash('user_exists','User Already Exists');
                Session::put('email_exists',$email);
                return Redirect()->Route('register_user');
            }
        }
        else {
          Log::info($user->email." user creation failed on ".date('l jS \of F Y h:i:s A'));
            Session::flash('bad_match','Passwords Do not Match');
            return Redirect()->Route('register_user');
        }
    }
}
