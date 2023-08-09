<?php

namespace App\Http\Controllers;

use App\Member;
use App\Pkey;
use App\Transaction;
use App\Wallet;
use App\Percentage;
use App\Http\Controllers\LayerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AddFundController extends Controller
{

    // public function create()
    // {
    //     return view("user.add-fund");
    // }

    public function create1()
    {
        return view("user.add-fund1");
    }

    

    // public function store(Request $request)
    // {   
    //     $token = csrf_token();
    //     $uid = Auth::user()->id;
    //     $data= DB::table('members')->where('uid','=',$uid)->get();
    //     $result = json_decode($data, true);
    //     $result = $result[0];
    //     // $result = array_add($result, 'check', 'hahaha');

    //     // $accesskey = 'b57b42e0-a7ab-11eb-8da3-710d6848047b';
    //     // $secretkey = '60277d413a8404a96a423cbf352f16b902ff182c';
    //     $key= 'App\Pkey'::find(1);
    //     $accesskey=$key->access_key;
    //     $secretkey=$key->secret_key;

    //     $environment = 'live';

    //     $sample_data = [
    //         'amount' => $request->amount,
    //         'currency' => 'INR',
    //         'name'  => $result['name'],
    //         'email_id' => $result['email'],
    //         'contact_number' => $result['phone'],
    //         'mtx' => '',
    //         'remote_script'=> "https://payments.open.money/layer"
    //     ];

    //     session_start();
    //     ob_start();

    //     $error = '';
    //     $tranid=date("ymd").'-'.rand(1,100);
        
    //     $sample_data['mtx']=$tranid; //unique transaction id to be passed for each transaction 
    //     $layer_api = new LayerController($environment,$accesskey,$secretkey);
    //     $layer_payment_token_data = $layer_api->create_payment_token($sample_data);
           
    //     if(empty($error) && isset($layer_payment_token_data['error'])){
    //         $error = 'E55 Payment error. ' . ucfirst($layer_payment_token_data['error']);  
    //         if(isset($layer_payment_token_data['error_data']))
    //         {
    //             foreach($layer_payment_token_data['error_data'] as $d)
    //                 $error .= " ".ucfirst($d[0]);
    //         }
    //     }
        
    //     if(empty($error) && (!isset($layer_payment_token_data["id"]) || empty($layer_payment_token_data["id"]))){				
    //         $error = 'Payment error. ' . 'Layer token ID cannot be empty.';        
    //     }   
        
    //     if(!empty($layer_payment_token_data["id"]))
    //         $payment_token_data = $layer_api->get_payment_token($layer_payment_token_data["id"]);
            
    //     if(empty($error) && !empty($payment_token_data)){
    //         if(isset($layer_payment_token_data['error'])){
    //             $error = 'E56 Payment error. ' . $payment_token_data['error'];            
    //         }
        
    //         if(empty($error) && $payment_token_data['status'] == "paid"){
    //             $error = "Layer: this order has already been paid.";            
    //         }
        
    //         if(empty($error) && $payment_token_data['amount'] != $sample_data['amount']){
    //             $error = "Layer: an amount mismatch occurred.";
    //         }
        
    //         $jsdata['payment_token_id'] = html_entity_decode((string) $payment_token_data['id'],ENT_QUOTES,'UTF-8');
    //         $jsdata['accesskey']  = html_entity_decode((string) $accesskey,ENT_QUOTES,'UTF-8');
                
    //         $hash = $this->create_hash(array(
    //             'layer_pay_token_id'    => $payment_token_data['id'],
    //             'layer_order_amount'    => $payment_token_data['amount'],
    //             'tranid'    => $tranid,
    //         ),$accesskey,$secretkey); 
                
    //         $html =  "<form action='payment' method='post' style='display: none' name='layer_payment_int_form'>
    //                     <input type='hidden' name='_token' value='".$token."'>
    //                     <input type='hidden' name='layer_pay_token_id' value='".$payment_token_data['id']."'>
    //                     <input type='hidden' name='tranid' value='".$tranid."'>
    //                     <input type='hidden' name='layer_order_amount' value='".$payment_token_data['amount']."'>
    //                     <input type='hidden' id='layer_payment_id' name='layer_payment_id' value=''>
    //                     <input type='hidden' id='fallback_url' name='fallback_url' value=''>
    //                     <input type='hidden' name='hash' value='".$hash."'>
    //                     </form>";
    //         $html .= "<script>";
    //         $html .= "var layer_params = " . json_encode( $jsdata ) . ';'; 
            
    //         $html .="</script>";
    //         $html .= '<script src="./layer_checkout.js"></script>';

    //         return view("user.add-fund")->with('error',$error)->with("sample_data",$sample_data)->with('html',$html);
    //     }

    //     return view("user.add-fund")->with('error',$error);
        
        
    // }

    public function store1(Request $request)
    {   
        $uid = Auth::user()->id;
        Log::info($uid);
        Log::info($request);
        $transaction= new Transaction();
        $transaction->uid=$uid;
        $transaction->transaction_id=$request->transaction_id;
        $transaction->amount=$request->amount;
        // $transaction->image=$request->transaction_screenshot;
        $transaction->des="Processing, Will reflect in Wallet Soon";
        $transaction->status="P";
        $transaction->save();
        return view("user.add-fund")->with('success','Payment Request Created Successfully');

        // return view("user.add-fund")->with('error',$error)->with("sample_data",$sample_data)->with('html',$html);

        // return view("user.add-fund")->with('error',$error);
        
        
    }

    public function payment(Request $request)
    {   
        // $accesskey = 'b57b42e0-a7ab-11eb-8da3-710d6848047b';
        // $secretkey = '60277d413a8404a96a423cbf352f16b902ff182c';
        // Log::info("in correct payment  ".$_POST['tranid']);
        $key= 'App\Pkey'::find(1);
        $accesskey=$key->access_key;
        $secretkey=$key->secret_key;
        $environment = 'live';
        session_start();
        ob_start();
        $error = "";
        $status = "";
        $uid = Auth::user()->id;

        if(!isset($_POST['layer_payment_id']) || empty($_POST['layer_payment_id'])){
            $error = "Invalid response.";    
        }
        try {
            $data = array(
                'layer_pay_token_id'    => $_POST['layer_pay_token_id'],
                'layer_order_amount'    => $_POST['layer_order_amount'],
                'tranid'     			=> $_POST['tranid'],
            );

            if(empty($error) && $this->verify_hash($data,$_POST['hash'],$accesskey,$secretkey) && !empty($data['tranid'])){
                $layer_api = new LayerController($environment,$accesskey,$secretkey);
                $payment_data = $layer_api->get_payment_details($_POST['layer_payment_id']);

                if(isset($payment_data['error'])){
                    $error = "Layer: an error occurred E14".$payment_data['error'];
                }

                if(empty($error) && isset($payment_data['id']) && !empty($payment_data)){
                    if($payment_data['payment_token']['id'] != $data['layer_pay_token_id']){
                        $error = "Layer: received layer_pay_token_id and collected layer_pay_token_id doesnt match";

                    }
                    elseif($data['layer_order_amount'] != $payment_data['amount']){
                        $error = "Layer: received amount and collected amount doesnt match";

                    }
                    else {
                        switch ($payment_data['status']){
                            case 'authorized':
                                break;
                            case 'captured':
                                $status = "Payment captured: Payment ID ". $payment_data['id'];
                                $transaction= new Transaction();
                                $transaction->uid=$uid;
                                $transaction->transaction_id=$payment_data['id'];
                                $transaction->amount=$payment_data['amount'];
                                $transaction->des="Added payment to Wallet";
                                $transaction->status="A";
                                $transaction->save();
                                $wallet= Wallet::all()->where('uid','=', $uid);
                                $wallets= 'App\Wallet'::find($wallet[0]->id);
                                $wallets->wallet_balance=$wallets->wallet_balance+$payment_data['amount'];
                                $wallets->deposit_status = 'T';
                                $wallets->save();
                                return view("user.add-fund")->with('success',$status);
                                break;
                            case 'failed':	
                                break;							    
                            case 'cancelled':
                                $status = "Payment cancelled/failed: Payment ID ". $payment_data['id'];                      
                                break;
                            default:
                                $status = "Payment pending: Payment ID ". $payment_data['id'];
                                exit;
                            break;
                        }
                        return view("user.add-fund")->with('success',$status);
                    }
                } else {
                    $error = "invalid payment data received E98";
                    return view("user.add-fund")->with('error',$error);
                }
            } else {
                $error = "hash validation failed";
                return view("user.add-fund")->with('error',$error);
            }

        } catch (Throwable $exception){
        $error =  "Layer: an error occurred " . $exception->getMessage();
        return view("user.add-fund")->with('error',$error);
            
        }

}

public function add_secuity()
{       
    $token = csrf_token();
    $uid = Auth::user()->id;
    $data= DB::table('members')->where('uid','=',$uid)->get();
    $result = json_decode($data, true);
    $result = $result[0];
    // $result = array_add($result, 'check', 'hahaha');

    // $accesskey = 'b57b42e0-a7ab-11eb-8da3-710d6848047b';
    // $secretkey = '60277d413a8404a96a423cbf352f16b902ff182c';
    $percentage= Percentage::all()->where('id','=', 1);
    $amount = $percentage[0]->s_money;
    $key= 'App\Pkey'::find(1);
    $accesskey=$key->access_key;
    $secretkey=$key->secret_key;

    $environment = 'live';

    $sample_data = [
        'amount' => $amount,
        'currency' => 'INR',
        'name'  => $result['name'],
        'email_id' => $result['email'],
        'contact_number' => $result['phone'],
        'mtx' => '',
        'remote_script'=> "https://payments.open.money/layer"
    ];

    session_start();
    ob_start();

    $error = '';
    $tranid=date("ymd").'-'.rand(1,100);
    
    $sample_data['mtx']=$tranid; //unique transaction id to be passed for each transaction 
    $layer_api = new LayerController($environment,$accesskey,$secretkey);
    $layer_payment_token_data = $layer_api->create_payment_token($sample_data);
       
    if(empty($error) && isset($layer_payment_token_data['error'])){
        $error = 'E55 Payment error. ' . ucfirst($layer_payment_token_data['error']);  
        if(isset($layer_payment_token_data['error_data']))
        {
            foreach($layer_payment_token_data['error_data'] as $d)
                $error .= " ".ucfirst($d[0]);
        }
    }
    
    if(empty($error) && (!isset($layer_payment_token_data["id"]) || empty($layer_payment_token_data["id"]))){				
        $error = 'Payment error. ' . 'Layer token ID cannot be empty.';        
    }   
    
    if(!empty($layer_payment_token_data["id"]))
        $payment_token_data = $layer_api->get_payment_token($layer_payment_token_data["id"]);
        
    if(empty($error) && !empty($payment_token_data)){
        if(isset($layer_payment_token_data['error'])){
            $error = 'E56 Payment error. ' . $payment_token_data['error'];            
        }
    
        if(empty($error) && $payment_token_data['status'] == "paid"){
            $error = "Layer: this order has already been paid.";            
        }
    
        if(empty($error) && $payment_token_data['amount'] != $sample_data['amount']){
            $error = "Layer: an amount mismatch occurred.";
        }
    
        $jsdata['payment_token_id'] = html_entity_decode((string) $payment_token_data['id'],ENT_QUOTES,'UTF-8');
        $jsdata['accesskey']  = html_entity_decode((string) $accesskey,ENT_QUOTES,'UTF-8');
            
        $hash = $this->create_hash(array(
            'layer_pay_token_id'    => $payment_token_data['id'],
            'layer_order_amount'    => $payment_token_data['amount'],
            'tranid'    => $tranid,
        ),$accesskey,$secretkey); 
            
        $html =  "<form action='security-payment' method='post' style='display: none' name='layer_payment_int_form'>
                    <input type='hidden' name='_token' value='".$token."'>
                    <input type='hidden' name='layer_pay_token_id' value='".$payment_token_data['id']."'>
                    <input type='hidden' name='tranid' value='".$tranid."'>
                    <input type='hidden' name='layer_order_amount' value='".$payment_token_data['amount']."'>
                    <input type='hidden' id='layer_payment_id' name='layer_payment_id' value=''>
                    <input type='hidden' id='fallback_url' name='fallback_url' value=''>
                    <input type='hidden' name='hash' value='".$hash."'>
                    </form>";
        $html .= "<script>";
        $html .= "var layer_params = " . json_encode( $jsdata ) . ';'; 
        
        $html .="</script>";
        $html .= '<script src="./layer_checkout.js"></script>';

        return view("user.add-securitymoney")->with('error',$error)->with("sample_data",$sample_data)->with('html',$html);
    }

    return view("user.add-securitymoney")->with('error',$error);
    
    
}

public function security_payment(Request $request)
{   
    // $accesskey = 'b57b42e0-a7ab-11eb-8da3-710d6848047b';
    // $secretkey = '60277d413a8404a96a423cbf352f16b902ff182c';
    // Log::info("in correct payment  ".$_POST['tranid']);
    $key= 'App\Pkey'::find(1);
    $accesskey=$key->access_key;
    $secretkey=$key->secret_key;
    $environment = 'live';
    session_start();
    ob_start();
    $error = "";
    $status = "";
    $uid = Auth::user()->id;

    if(!isset($_POST['layer_payment_id']) || empty($_POST['layer_payment_id'])){
        $error = "Invalid response.";    
    }
    try {
        $data = array(
            'layer_pay_token_id'    => $_POST['layer_pay_token_id'],
            'layer_order_amount'    => $_POST['layer_order_amount'],
            'tranid'     			=> $_POST['tranid'],
        );

        if(empty($error) && $this->verify_hash($data,$_POST['hash'],$accesskey,$secretkey) && !empty($data['tranid'])){
            $layer_api = new LayerController($environment,$accesskey,$secretkey);
            $payment_data = $layer_api->get_payment_details($_POST['layer_payment_id']);


            if(isset($payment_data['error'])){
                $error = "Layer: an error occurred E14".$payment_data['error'];
            }

            if(empty($error) && isset($payment_data['id']) && !empty($payment_data)){
                if($payment_data['payment_token']['id'] != $data['layer_pay_token_id']){
                    $error = "Layer: received layer_pay_token_id and collected layer_pay_token_id doesnt match";
                }
                elseif($data['layer_order_amount'] != $payment_data['amount']){
                    $error = "Layer: received amount and collected amount doesnt match";
                }
                else {
                    switch ($payment_data['status']){
                        case 'authorized':
                        case 'captured':
                            $status = "Payment captured: Payment ID ". $payment_data['id'];
                            $transaction= new Transaction();
                            $transaction->uid=$uid;
                            $transaction->transaction_id=$payment_data['id'];
                            $transaction->amount=$payment_data['amount'];
                            $transaction->des="Added Security Amount";
                            $transaction->status="A";
                            $transaction->save();
                            $wallet= Wallet::all()->where('uid','=', $uid);
                            $wallets= 'App\Wallet'::find($wallet[0]->id);
                            $wallets->security_amount=$wallets->security_amount+$payment_data['amount'];
                            $wallets->security_status='T';
                            $wallets->deposit_status = 'T';
                            $wallets->save();
                            return view("user.add-securitymoney")->with('success',$status);
                            break;
                        case 'failed':								    
                        case 'cancelled':
                            $status = "Payment cancelled/failed: Payment ID ". $payment_data['id'];                      
                            break;
                        default:
                            $status = "Payment pending: Payment ID ". $payment_data['id'];
                            exit;
                        break;
                    }
                    return view("user.add-fund")->with('success',$status);
                }
            } else {
                $error = "invalid payment data received E98";
                return view("user.add-fund")->with('error',$error);
            }
        } else {
            $error = "hash validation failed";
            return view("user.add-fund")->with('error',$error);
        }

    } catch (Throwable $exception){

    $error =  "Layer: an error occurred " . $exception->getMessage();
    return view("user.add-fund")->with('error',$error);
        
    }

}



    function create_hash($data,$accesskey,$secretkey){
        ksort($data);
        $hash_string = $accesskey;
        foreach ($data as $key=>$value){
            $hash_string .= '|'.$value;
        }
        return hash_hmac("sha256",$hash_string,$secretkey);
    }

    function verify_hash($data,$rec_hash,$accesskey,$secretkey){
        $gen_hash = $this->create_hash($data,$accesskey,$secretkey);
        if($gen_hash === $rec_hash){
            return true;
        }
        return false;
    }
    
}
