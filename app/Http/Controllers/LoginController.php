<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateRequest;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    protected function login(Request $request){
        $email = $request['email'];
		$password = $request['password'];
 
		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
			return redirect('/');
		} else {
			return redirect('login');
		}
    }   
}
