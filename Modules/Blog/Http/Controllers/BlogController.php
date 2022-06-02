<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\Blog;

use App\Models\Menu;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
        $blog = Blog::all('img','title','id');
        return view('blog::index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {   
        $menus = Menu::all('name','id');
        return view('blog::create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {   
        request()->validate([
            'category' => 'required',
            'title' => 'required',
            'content' => 'required',
            'img' => 'required'
        ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category = $request->category;
        $file= $request->file('img');
        $filename= date('YmdHi').'-'.$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        $blog->img = $filename;
        $blog->save();
        return redirect('/');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {   
        $blog = Blog::where('id', $id)->get();
        return view('blog::show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {   
        $blog = Blog::where('id', $id)->get();
        $menus = Menu::all('name','id');
        return view('blog::edit',compact('blog','menus'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {   
        request()->validate([
            'category' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $title = $request->title;
        $content = $request->content;
        $category = $request->category;
        
        if(!$request->file('img')){
            $blog = Blog::where('id', $id)
              ->update(['title' => $title,'category' => $category,'content' => $content]);
            return redirect('/');
        }
        else{
            $file= $request->file('img');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $img = $filename;
            $blog= Blog::where('id', $id)
              ->update(['title' => $title , 'img'=>$img , 'content' => $content ,'category'=>$category ]);
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deleted = Blog::destroy('id',$id);
        return redirect('/');
    }
}
