<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;



class PaymentAddRequestController extends Controller
{
    
    public function showadmin()
    {

        $transaction = Transaction::all()->where('status','=','P');
        return view('admin.payment-add-request')->with('lists',$transaction);

    }

}
