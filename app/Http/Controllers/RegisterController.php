<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\User\CreateRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller{
    public function index(){
        return view('auth.register');
    }
    protected function create(CreateRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('login')->with('status','Đăng kí thành công'); 
    }   
}
