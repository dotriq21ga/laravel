<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Menu;

use App\Models\Product;

class UserController extends Controller
{
    protected function logout(){
        Auth::logout();
        return \redirect('/');
    }
    protected function profile(){
        $id = Auth::id();
        $product = Product::where('user_id', [$id])->get();
        if(Auth::user()->isAdmin==0){
            $menus =  Menu::all();
            return view('auth.profile',compact('product','menus'));
        }else{
            return view('auth.profile',compact('product'));
        }
    }
}
