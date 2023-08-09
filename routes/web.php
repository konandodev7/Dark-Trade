<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentAddRequestController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('home');
});
Route::get('/check', function () { 
    return view('check');
});

Route::get('/login', ["App\Http\Controllers\Auth\LoginController","index"]); 
Route::post('/login', ["App\Http\Controllers\Auth\LoginController","login"]);
Route::get('/logout', ["App\Http\Controllers\Auth\LoginController","logout"]);

Route::get('/registration', ["App\Http\Controllers\Auth\RegisterController","index"]); 
Route::post('/registration', ["App\Http\Controllers\Auth\RegisterController","login"]);


 //-----------Admin Route Started------------------------
Route::group(['prefix' => 'admin',"middleware"=>["adminauth"]], function () {
    Route::get("/dashboard",[AdminController::class,"index"]);

    //----------- Member------------------------
    Route::get('/view-member', ["App\Http\Controllers\MemberController","show"]);
    Route::get('/edit-member/{id}', ["App\Http\Controllers\MemberController","edit"]);
    Route::post('/update-member', ["App\Http\Controllers\MemberController","update"]);


     //----------- Promocde------------------------
    Route::get('/create-promocode', ["App\Http\Controllers\PromoCodeController","index"]);
    Route::get('/view-promocode', ["App\Http\Controllers\PromoCodeController","show"]);
    Route::post('/store-promocode', ["App\Http\Controllers\PromoCodeController","store"]);

    //----------- Percentage------------------------
    Route::get('/edit-percentage', ["App\Http\Controllers\PercentageController","edit"]);
    Route::post('/update-percentage', ["App\Http\Controllers\PercentageController","update"]);

    // --------------------- Payment Add Request----------------------
    Route::get('/view-payment-add-request', ["App\Http\Controllers\PaymentAddRequestController","showadmin"]);

    // --------------------- Transaction----------------------
    Route::get('/view-transaction', ["App\Http\Controllers\TransactionController","showadmin"]);

    // --------------------- Withdrawal----------------------
    Route::get('/view-withdrawal', ["App\Http\Controllers\WithdrawalController","showadmin"]);
    Route::get('/verify-withdrawal/{id}', ["App\Http\Controllers\WithdrawalController","edit"]);
    Route::post('/approve-withdrawal', ["App\Http\Controllers\WithdrawalController","approve"]);

    // --------------------- Change Password----------------------
    Route::get('/change-password', ["App\Http\Controllers\Auth\ResetPasswordController","index_admin"]);
    Route::post('/update-password', ["App\Http\Controllers\Auth\ResetPasswordController","password_reset_admin"]);

     // --------------------- Change Keys----------------------
     Route::get('/change-key', ["App\Http\Controllers\AdminController","create"]);
     Route::post('/update-key', ["App\Http\Controllers\AdminController","store"]);
   
});


// --------------------- User Route----------------------

Route::group(['prefix' => 'user',"middleware"=>["userauth"]], function () {
    Route::get("/dashboard",[UserController::class,"index"]);

    // --------------------- Add Fund----------------------
    Route::get('/add-fund', ["App\Http\Controllers\AddFundController","create1"]);
    Route::post('/store-fund', ["App\Http\Controllers\AddFundController","store1"]);
    Route::post('/payment', ["App\Http\Controllers\AddFundController","payment"]);
    Route::get('/add-security-money', ["App\Http\Controllers\AddFundController","add_secuity"]);
    Route::post('/security-payment', ["App\Http\Controllers\AddFundController","security_payment"]);

    // --------------------- Transaction----------------------
    Route::get('/view-transaction', ["App\Http\Controllers\TransactionController","show"]);

    // --------------------- Withdrawal----------------------
    Route::get('/view-withdraw', ["App\Http\Controllers\WithdrawalController","show"]);
    Route::post('/create-withdrawal-req', ["App\Http\Controllers\WithdrawalController","store"]);
    
    // --------------------- PromoCode----------------------
    Route::get('/apply-promocode', ["App\Http\Controllers\PromoCodeController","usershow"]);
    Route::post('/update-promocode', ["App\Http\Controllers\PromoCodeController","update"]);

    // --------------------- Change Password----------------------
    Route::get('/change-password', ["App\Http\Controllers\Auth\ResetPasswordController","index"]);
    Route::post('/update-password', ["App\Http\Controllers\Auth\ResetPasswordController","password_reset"]);
    Route::get('/edit-profile', ["App\Http\Controllers\MemberController","edit_profile"]);
    Route::post('/update-profile', ["App\Http\Controllers\MemberController","update_profile"]);

   
});