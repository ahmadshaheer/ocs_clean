<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;
use Session;
use Hash;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request) {
        $email = $request->input('email');
        $password =$request->input('password');
        $rec = DB::table('users')->where('email',$email)->first();
        if($rec!=null){
          $password_db = $rec->password;
          if(Hash::check($password,$password_db)) {
              $username = $rec->name;
              Session::put('username',$username);
              Session::put('email',$email);
              Session::put('role',$rec->role);
              return redirect()->route('admin');
          }
          else {
            Session::flash('login_failed','Incorrect Email Or Password');
            return Redirect()->route('login');
          }
        }
        else {
            Session::flash('login_failed','This Email Doesnt Belong To Any User, Please Create An Account and Try Again Later!!!');
            return Redirect()->route('login');
        }
        // if (Auth::attempt(['email' => $email, 'password' => $password])) {
        //     // Authentication passed...
        //     return redirect()->route('admin');
        // }
        // else {
        //     echo "failed";
        // }

    }
    public function logout() {
        session()->flush();
        return redirect()->route('login');
    }
    public function destroy($id)
    {
        $stories = User::findOrFail($id);
        $stories->delete();
        return Redirect()->route('users');
    }
    public function users() {



    }
    public function edit_user($id) {
        $user = User::findOrFail($id);
        return view('admin.edit_user')->with('user',$user);
    }
    public function update_user($id,Request $request) {
      $user = User::findOrFail($id);
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->role = $request->input('role');
      $user->save();
      return Redirect()->route('admin');
    }

}