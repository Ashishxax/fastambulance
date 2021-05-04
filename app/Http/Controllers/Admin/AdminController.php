<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use Redirect;

class AdminController extends Controller
{
    public function admin_login(Request $request){
        $userdata = array(
            'email'     => $request['email'],
            'password'  => $request['password']
        );
        if (Auth::attempt($userdata)) 
            return redirect()->route('dashboard');
        else        
            return Redirect::to('admin/login');
    }
    public function admin_logout(Request $request){
        Auth::logout();
        return Redirect('/');
    }
}

        
        
