<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{   
    public function show($id){
        $product = DB::select('select * from products where menu_id = ? and user_id is null', [$id] );
        return view('product.index' ,compact('product'));
    }
    public function create(){
        $menus = DB::select('select * from menus');   
        return view('product.createpro',compact('menus'));
    }
    protected function store(Request $request){
        $product = new Product();
        $product->price = $request->price ;
        $product->menu_id = $request->menu_id ;
        $file= $request->file('img');
        $filename= date('YmdHi').'-'.$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        $product->img = $filename;
        $product->save();
        return redirect('/');
    }
    public function edit($id){
        $product = DB::select('select * from products where id = ?', [$id] );
        $menus = DB::select('select id , name from menus ' );
        return view('product.update',compact('product'),compact('menus'));
    }
    protected function update(Request $request, $id){
        if(!$request->file('img')){
            $price = $request->get('price');
            $menu_id = $request->get('menu_id');
            $menus = DB::table('products')
              ->where('id', $id)
              ->update(['price' => $price,'menu_id'=> $menu_id]);
            return redirect('/');
        }
        else{
            $price = $request->get('price');
            $menu_id = $request->get('menu_id');
            $file= $request->file('img');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $img = $filename;
            $menus = DB::table('products')
              ->where('id', $id)
              ->update(['price' => $price , 'img'=>$img , 'menu_id' => $menu_id]);
            return redirect('/');
        }
    }
    protected function detroy($id){
        $deleted = DB::table('products')->where('id', '=', $id)->delete();
        return redirect('/');
    }
    protected function trans($id){
        $user_id = Auth::user()->id;
        $menus = DB::table('products')
              ->where('id', $id)
              ->update(['user_id' => $user_id]);
    }
}
