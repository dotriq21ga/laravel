<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected function logout(){
        Auth::logout();
        return \redirect('/');
    }
    protected function profile(){
        $id = Auth::id();
        $product = DB::select('select * from products where user_id = ? ', [$id] );
        if(Auth::user()->isAdmin==0){
            $menus =  DB::select('select * from menus');
            return view('auth.profile',compact('product','menus'));
        }else{
            return view('auth.profile',compact('product'));
        }
        
    }
}
