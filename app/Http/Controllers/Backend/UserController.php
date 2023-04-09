<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', ["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.insert_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    { 
        $name=$req->get ("name");
        $email=$req->get ("email");
        $password=$req->get ("password");
        $is_admin=$req->get ("is_admin");
        $is_active=$req->get ("is_active");

        $is_admin = $is_admin =="1" ? 1:0;
        $is_active = $is_active =="1"? 1:0;


        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password =$password;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        dd($req);

        $user->save();


        /* 
        
        $user = new User();
        $user->fill($req->all());
        $user->save();
        
        */


        return Redirect::to("/users");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.users.update_form' ,["user"=>$user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "destroy";
    }
}
