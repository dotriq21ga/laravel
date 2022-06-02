<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Menu;

use App\Models\Product;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected function logout(){
        Auth::logout();
        return \redirect('/');
    }
    protected function profile(){
        $id = Auth::id();
        $user = User::where('id',$id)->get(['email','name']);
        $product = Product::where('user_id', $id)->get();
        if(Auth::user()->isAdmin==0){
            $menus =  Menu::all();
            return view('auth.profile',compact('product','user','menus'));
        }else{
            return view('auth.profile',compact('product','user'));
        }
    }
    public function update(Request $request){
        request()->validate([
            'name' => [
                'required',
                'unique:App\Models\User,name',
                'min:6',
                'max:20',
                'string'
            ],
            'email' => [
                'required',
                'unique:App\Models\User,email',
                'email'
            ],
        ]);
        $id = Auth::id();
        $name = $request->name;
        $email = $request->email;
		$user = User::where('id',$id)
                ->update(['name' => $name ,'email' => $email]);
        return redirect('/');
    }
    
    public function edit_password(){
        return view('auth.password_reset');
    }

    public function reset_pasword(Request $request){
        request()->validate([
            'password' => [
                'required',
                'string',
                'min:6',
                'max:30',
                'confirmed',
            ],
        ]);

        $id = Auth::id();
        $password_old= $request->password_old ;
        if(Auth::attempt(['id'=>$id,'password' => $password_old])) {
            $password = Hash::make($request->password);
            $user = User::find($id);
            $user->password = $password ;
            $user->save();
			return redirect(route('profile'));
		} else {
			return redirect('/');
		}
        
    }
}
