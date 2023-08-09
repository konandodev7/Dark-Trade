<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Member;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    //use RegistersUsers;

    
    public function index(){
        return view('register');
    }

    public function register(Request $request){


        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);;

            $user = User::create([
                    'name' => $request->name,
                    'role' => 'user',
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $insertedId = $user->id;

                $length = 6;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }


                Member::create([
                    'name' => $request->name,
                    'uid' => $insertedId,
                    'email' => $request->email,
                    'self_code'=>$randomString,
                    'referal_code' => $request->referral_code,
                    'phone'=>$request->phone,
                ]);
                
                $wallet= new Wallet();
                $wallet->uid=$insertedId;
                $wallet->security_amount=0;
                $data1= DB::table('percentages')->get();
                if($request->referral_code!=Null){
                    $data= DB::table('members')->where('self_code','=',$request->referral_code)->get();
                    if(!$data->isEmpty()){
                        $wallet->wallet_balance=$data[0]->r_money+$data[0]->f_money;                 
                    }
                }
                else{
                    $wallet->wallet_balance=$data1[0]->f_money;
                }
                $wallet->wallet_balance=$data1[0]->f_money;
                $wallet->f_money_status='T';    
                $wallet->save();
            return redirect()->back()->with('success','Successfully Registered,Please Login');
    }

    public function login(Request $request){


        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);;

            $user = User::create([
                    'name' => $request->name,
                    'role' => 'user',
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $insertedId = $user->id;

                $length = 6;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }


                Member::create([
                    'name' => $request->name,
                    'uid' => $insertedId,
                    'email' => $request->email,
                    'self_code'=>$randomString,
                    'referal_code' => $request->referral_code,
                    'phone'=>$request->phone,
                ]);
                
                $wallet= new Wallet();
                $wallet->uid=$insertedId;
                $wallet->security_amount=0;
                $data1= DB::table('percentages')->get();
                if($request->referral_code!=Null){
                    $data= DB::table('members')->where('self_code','=',$request->referral_code)->get();
                    if(!$data->isEmpty()){
                        $wallet->wallet_balance=$data[0]->r_money+$data[0]->f_money;                 
                    }
                }
                else{
                    $wallet->wallet_balance=$data1[0]->f_money;
                }
                $wallet->wallet_balance=$data1[0]->f_money;
                $wallet->f_money_status='T';    
                $wallet->save();
            return redirect()->back()->with('success','Successfully Registered,Please Login');
    }

    
}
