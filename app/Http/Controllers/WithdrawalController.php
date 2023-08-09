<?php

namespace App\Http\Controllers;

use App\Withdrawal;
use App\Member;
use App\Wallet;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends Controller
{
    
    
    public function store(Request $request)
    {   
        $req_amount=$request->amount;
        $uid = Auth::user()->id;
        $data= DB::table('wallets')->where('uid','=',$uid)->get();
        $security_amount = $data[0]->security_amount;
        $security_status = $data[0]->security_status;
        $deposit_status = $data[0]->deposit_status;
        $wallet_amount = $data[0]->wallet_balance;
        $withdraw_days = $data[0]->withdraw_days;
        $total_money=$security_amount+$wallet_amount;

        Log::info("yes in security");
        Log::info($total_money);
        $member=DB::table('members')->where('uid','=',$uid)->get();
        foreach($member as $members){
            if($members->account_holder==Null and $members->upi==Null){
                return redirect('user/view-withdraw')->with('error','Add bank Details first -> Under Profile');  
            }
        }
        

        if ($req_amount>$total_money){
            return redirect('user/view-withdraw')->with('error','Insufficient Fund');
        } 
        
        if ($security_status=='F' && $deposit_status=='T')
            return redirect('user/view-withdraw')->with('error','Add Security Money First');
        
        
        if ($withdraw_days > 0 && $deposit_status =='T' )
            return redirect('user/view-withdraw')->with('error','You Have to Wait '.$withdraw_days.' to Place Withdrawal Request');

            
            $withdraw= new Withdrawal();
            $withdraw->amount = $req_amount;
            $withdraw->uid = Auth::user()->id;
            $withdraw->save();
            return redirect('user/view-withdraw')->with('success','Request Placed Successfuly');
        
    }

    

    public function show()
    {
        $uid = Auth::user()->id;
        $withdrawal = Withdrawal::all()->where('uid','=',$uid);;
       return view('user.withdrawal')->with('lists',$withdrawal);
    }



    public function showadmin()
    {
        $withdrawal = Withdrawal::all();
       return view('admin.withdrawal')->with('lists',$withdrawal);
    }


    
    
    public function edit($id)
    {
        $withdrawal = Withdrawal::all()->where('id','=',$id);
        return view('admin.withdrawal-check')->with('lists',$withdrawal);
    }


    public function approve(Request $request )
    {   
        $withdraw = 'App\Withdrawal'::find($request->id);

        if($request->action=="approve"){
            $validatedData = $request->validate([
                'trans' => ['required', 'string', 'max:255'],
                'des' => ['required', 'string', 'max:255'],
                ]);

            $withdraw->status='A';
            $withdraw->des=$request->des;
            $withdraw->save();

            $trans= new Transaction();
            $trans->uid=$request->uid;
            $trans->transaction_id=$request->trans;
            $trans->amount=$request->amount;
            $trans->des=$request->des;
            $trans->status='W';
            $trans->save();
            
            $data= DB::table('wallets')->where('uid','=',$request->uid)->get();
            $wallet= 'App\Wallet'::find($data[0]->id);
            if($data[0]->wallet_balance!=0){
                    if($data[0]->wallet_balance>=$request->amount){
                        $wallet->wallet_balance= $data[0]->wallet_balance-$request->amount;
                    }
                    else{
                        $new_amount= $request->amount-$data[0]->wallet_balance;
                        $wallet->wallet_balance=0;
                        $wallet->security_amount=$data[0]->security_amount-$new_amount;
                    }
            }
            else{
                $wallet->security_amount=$data[0]->security_amount-$request->amount;
            }
            $wallet->save();
            return redirect('admin/view-withdrawal')->with('success','Withdrawal Successful');
        }   
        else {
                $validatedData = $request->validate([
                    'des' => ['required', 'string', 'max:255'],
                        ]);
                $withdraw->status='C';
                $withdraw->des=$request->des;
                $withdraw->save();
                return redirect('admin/view-withdrawal')->with('success','Decline Successful');
        }

    }


}
