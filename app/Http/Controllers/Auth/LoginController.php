<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;

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

    public function index(){
        return view('login');
    }
    public function login(Request $request){    
        $email=$request->input("email");
        $password=$request->input("password");

        //if(Auth::attempt(['email' => $email, 'password' => $password])){
            $user = User::find(26);
            Auth::login($user);
            return redirect('user/dashboard');
            /*$users = User::all()->where('email','=', $email);
            // Log::info($users);
            foreach($users as $user){
                if($user->role == "admin"){
                    Log::info('Login successfull Admin');
                    return redirect('admin/dashboard');
                }
                elseif($user->role == "user"){
                    Log::info('Login successfull User');
                    return redirect('user/dashboard');
                }
                else {
                    return redirect('login')->with('error','Invalid Username or Password1');
                }
            }*/
        /*}else{
            return redirect('login')->with('error','Invalid Username or Password2');
        }*/
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
