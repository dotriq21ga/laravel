<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class ProductController extends Controller
{   
    public function show($id){
        $product = Product::where('id',$id);
        return view('product.detail',compact('product'));
    }
    public function create(){
        $menus = Menu::all(); 
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
        $product = Product::where('id', $id)->get();
        $menus = Menu::all();
        return view('product.update',compact('product','menus'));
    }
    protected function update(Request $request, $id){
        $price = $request->get('price');
        $menu_id = $request->get('menu_id');
        if(!$request->file('img')){
            $product = Product::where('id', $id)
              ->update(['price' => $price,'menu_id'=> $menu_id]);
            return redirect('/');
        }
        else{
            $file= $request->file('img');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $img = $filename;
            $product= Product::where('id', $id)
              ->update(['price' => $price , 'img'=>$img , 'menu_id' => $menu_id]);
            return redirect('/');
        }
    }
    protected function detroy($id){
        $deleted = Product::destroy('id',$id);
        return redirect('/');
    }
    protected function trans($id){
        $user_id = Auth::user()->id;
        $menus = Product::where('id', $id)
              ->update(['user_id' => $user_id]);
    }
}
