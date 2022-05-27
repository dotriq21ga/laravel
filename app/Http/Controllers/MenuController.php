<?php

namespace App\Http\Controllers;

use App\Http\Requests\Menu\CreateRequest;

use Illuminate\Http\Request;

use App\Models\Menu;

use App\Repositories\MenuRepository;

class MenuController extends Controller
{
    protected $menuRepository;
    public function __construct(MenuRepository $menuRepository) 
	{ 
		$this->menuRepository = $menuRepository;
	}
    public function index(){
        $menus = $this->menuRepository->getall();

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
        $menus = $this->menuRepository->getid($id);
        return view('menu.update',compact('menus'));
    }
    protected function update(Request $request, $id){
        if(!$request->file('img')){
            $name = $request->get('name');
            $menus = Menu::where('id', $id)
              ->update(['name' => $name]);
            return redirect('/');
        }
        else{
            $name = $request->get('name');
            $file= $request->file('img');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $img = $filename;
            $menus = Menu::where('id', $id)
              ->update(['name' => $name , 'img'=>$img]);
            return redirect('/');
        }
    }
    protected function detroy($id){
        $deleted = Menu::destroy('id',$id);
        return redirect('/');
    }
}
