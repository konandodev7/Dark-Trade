<?php

namespace App\Http\Controllers;

use App\Pkey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
     }

     public function create()
    {
        return view("admin.change-key");
     }

     public function store(Request $request)
    {
        $key= 'App\Pkey'::find(1);
        $key->access_key=$request->access_key;
        $key->secret_key=$request->secret_key;
        $key->save();
        return redirect('admin/change-key')->with('success','Key Updated Sucessfully');
     }
}
