<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view ('admin.login');
    }

    public function login_submit(Request $request){
       

    }

    public function forget_password(){
        return view ('admin.froget_password');
    }

    public function forget_password_submit(){
        //   return view ('admin.froget_password'); 

    }
}
