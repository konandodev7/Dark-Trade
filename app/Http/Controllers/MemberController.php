<?php

namespace App\Http\Controllers;

use App\Member;
use App\Wallet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class MemberController extends Controller
{
    public function show()
    {
        $member = Member::all();
        // $member1 = Member::latest()->get();
        return view('admin.member.view-member')->with('lists',$member);

    }

    public function edit($id)
    {
        $wallet = Wallet::all()->where('uid','=', $id);
        return view('admin.member.edit-member')->with('lists',$wallet);

    }

    public function update(Request $request)
    {
        $id=$request->id;
        $wallet= 'App\Wallet'::find($id);
        $wallet->withdraw_days=$request->withdraw_days;
        $wallet->save();
        $id=$request->uid;
        $user= 'App\User'::find($id);
        $user->is_del=$request->is_del;
        $user->save();

        return redirect('admin/view-member')->with('success','Update Successfully');

    }

    public function edit_profile()
    {   
        
        $member = Member::all()->where('uid','=', Auth::user()->id);
        return view('user.edit-profile')->with('lists',$member);

    }

    public function update_profile(Request $request)
    {
        $id=$request->id;
        $member= 'App\Member'::find($id);
        $member->name=$request->name;
        $member->phone=$request->phone;
        $member->address=$request->address;
        $member->account_holder=$request->account_holder;
        $member->account_no=$request->account_no;
        $member->account_ifsc=$request->account_ifsc;
        $member->upi=$request->upi;
        $member->save();

        return redirect('user/edit-profile')->with('success','Update Successfully');

    }


}
