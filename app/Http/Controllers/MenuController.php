<?php

namespace App\Http\Controllers;

use App\Http\Requests\Menu\CreateRequest;

use Illuminate\Http\Request;

use App\Models\Menu;

use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(){
        $menus = DB::select('select * from menus');

        return view('index',compact('menus'));
    }
    public function create(){
        return view('menu.create');
    }
    protected function store(CreateRequest $request){
        //if(!$request->file('img')){
        //    return redirect('/add');
        //}
        //else{
            $menu= new Menu();
            $menu->name = $request->get('name');
            $file= $request->file('img');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $menu->img = $filename;
            $menu->save();
            return redirect('/');
        //}
    }
    public function edit($id){
        $menus = DB::select('select * from menus where id = :id', ['id' =>$id]);
        return view('menu.update',compact('menus'));
    }
    protected function update(Request $request, $id){
        if(!$request->file('img')){
            $name = $request->get('name');
            $menus = DB::table('menus')
              ->where('id', $id)
              ->update(['name' => $name]);
            return redirect('/');
        }
        else{
            $name = $request->get('name');
            $file= $request->file('img');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $img = $filename;
            $menus = DB::table('menus')
              ->where('id', $id)
              ->update(['name' => $name , 'img'=>$img]);
            return redirect('/');
        }
    }
    protected function detroy($id){
        $deleted = DB::table('menus')->where('id', '=', $id)->delete();
        return redirect('/');
    }
}
