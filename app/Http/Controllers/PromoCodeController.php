<?php

namespace App\Http\Controllers;

use App\Promocode;
use App\Wallet;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PromoCodeController extends Controller
{
    public function index(){
        return view("admin.promocode.create-promocode");
    }

    public function store(Request $request)
    {   
        Log::info($request);
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $length; $i++) {
                 $randomString .= $characters[rand(0, $charactersLength - 1)];
             }
        
        $promo= new Promocode();
        $promo->code= $randomString;

        $method_PR = $request->method_PR;
        if($method_PR=="Rupees")
            $promo->rupees= $request->amount;
        else
            $promo->percentage= $request->amount;
        
        $promo->purpose= $request->purpose;

        $promo->save();
        return redirect('admin/view-promocode');


    }

    public function show() 
    {
        $category = Promocode::all();
       return view('admin.promocode.view-promocode')->with('lists',$category);
       
    }

    public function usershow() 
    {
        return view("user.promocode");
       
    }

    public function update(Request $request) 
    {
        $uid = Auth::user()->id;
        $data= DB::table('promocodes')->where('code','=',$request->code)->where('status','=','F')->get();
        if(!$data->isEmpty()){
            if($data[0]->percentage!=NULL){
                $data1= DB::table('wallets')->where('uid','=',$uid)->get();

                if ($data[0]->purpose=='W'){
                    
                    $new_amount=$data1[0]->wallet_balance +(($data[0]->percentage / 100) * $data1[0]->wallet_balance);
                    $wallet= 'App\Wallet'::where('uid', '=', $uid)->first();
                    $wallet->wallet_balance = $new_amount;
                    $wallet->save();
                }
                else{

                    $new_amount=$data1[0]->security_amount +(($data[0]->percentage / 100) * $data1[0]->security_amount);
                    $wallet= 'App\Wallet'::where('uid', '=', $uid)->first();
                    $wallet->security_amount = $new_amount;
                    $wallet->security_status = 'T';
                    $wallet->save();
                }

                $promocode= 'App\Promocode'::where('code', '=', $request->code)->first();
                $promocode->uid=$uid;
                $promocode->status='T';
                $promocode->save();

                $trans= new Transaction();
                $trans->uid=$uid;
                $trans->amount=$new_amount;
                $trans->des="PromoCode .$request->code.";
                $trans->status='A';
                $trans->save();

                return redirect('user/apply-promocode')->with('success','PromoCode Applied Successfully');

            }   
            else{

                $data1= DB::table('wallets')->where('uid','=',$uid)->get();
                if ($data[0]->purpose=='W'){

                    $new_amount=$data1[0]->wallet_balance +$data[0]->rupees ;
                    $wallet= 'App\Wallet'::where('uid', '=', $uid)->first();
                    $wallet->wallet_balance = $new_amount;
                    $wallet->promo_status = 'T';
                    $wallet->save();
                }
                else{

                    $new_amount=$data1[0]->security_amount +$data[0]->rupees ;
                    $wallet= 'App\Wallet'::where('uid', '=', $uid)->first();
                    $wallet->security_amount = $new_amount;
                    $wallet->promo_status = 'T';
                    $wallet->save();
                }
                

                $promocode= 'App\Promocode'::where('code', '=', $request->code)->first();
                $promocode->uid=$uid;
                $promocode->status='T';
                $promocode->save();

                $trans= new Transaction();
                $trans->uid=$uid;
                $trans->amount=$new_amount;
                $trans->des="PromoCode .$request->code.";
                $trans->status='A';
                $trans->save();

                return redirect('user/apply-promocode')->with('success','PromoCode Applied Successfully');
            }
        }
        else
        return redirect('user/apply-promocode')->with('error',' Invalid PromoCode ');

    }
}
