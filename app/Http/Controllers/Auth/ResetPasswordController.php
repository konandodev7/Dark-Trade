<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function index()
    {
        return view('user.change-password');
    }
    

    public function password_reset(Request $request)
    {
        if(strcmp($request->pwd,$request->repwd)){
            $uid = Auth::user()->id;
            $user= 'App\User'::find($uid);
            $user->password=Hash::make($request->pwd);
            $user->save();
            return redirect('user/change-password')->with('success','Password Changed Sucessfully');
        }
        else {
            return redirect('user/change-password')->with('error','Password and confirm password not match');
        }
    }

    public function index_admin()
    {
        return view('admin.change-password');
    }

    public function password_reset_admin(Request $request)
    {
        if(strcmp($request->pwd,$request->repwd)){
            $uid = Auth::user()->id;
            $user= 'App\User'::find($uid);
            $user->password=Hash::make($request->pwd);
            $user->save();
            return redirect('admin/change-password')->with('success','Password Changed Sucessfully');
        }
        else {
            return redirect('admin/change-password')->with('error','Password and confirm password not match');
        }
    }
}
