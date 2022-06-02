<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = User::where('isAdmin',true)->get(['id','name','email']);
        return view('admin::index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = User::where('id',$id)
                ->where('isAdmin',true)
                ->get(['name','email','id']);

        return view('admin::edit',compact('user'));
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
            'name' => ['required','unique:App\Models\User,name','min:6','max:20','string'],
        ]);
        $name = $request->name;
        $email = $request->email;
        $user = User::where('id',$id)
                    ->where('isAdmin',true)
                    ->update(['name' => $name , 'email' => $email]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)
                    ->where('isAdmin',true);
        $delete = $user->delete();
        return redirect('/');
    }
}
