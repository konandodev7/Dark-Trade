<?php

namespace App\Http\Controllers;

use App\Percentage;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PercentageController extends Controller
{
    
    public function edit(){

        $percentage = Percentage::all();
        return view("admin.finance.percentage")->with('list',$percentage);
    }

    public function update(Request $request)
    {
        $percentage= 'App\Percentage'::find(1);
        $percentage->f_money = $request->f_money;
        $percentage->d_money = $request->d_money;
        $percentage->s_money = $request->s_money;
        $percentage->r_money = $request->r_money;
        $percentage->i_money = $request->i_money;
        $percentage->d_money_status = $request->d_money_status;
        $percentage->i_money_status = $request->i_money_status;
        $percentage->save();
        
        if($request->i_money_status=='T')
        {   
            $percentage = $request->i_money - 2 ;
            $wallets = Wallet::all();

            foreach ($wallets as $wallet){
                $amount=($percentage/100)*$wallet->wallet_balance;
                $new_withdraw = 'App\Wallet'::find($wallet->id);
                $new_withdraw->wallet_balance = $wallet->wallet_balance + $amount ;
                $new_withdraw->save();
            }    
            
        }
        return redirect('admin/edit-percentage');
    }
    
}
