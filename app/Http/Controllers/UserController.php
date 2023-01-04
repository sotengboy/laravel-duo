<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create() {
        return view('users.create');
    }
    public function post(Request $request) {
        request()->validate([
            'image' => 'required',
            'name' => 'required',
            'email'=> 'required'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request['password']),
            "function" => $request->function,
            "image" => $imageName
        ]);

        request()->image->move(public_path('users'), $imageName);
        return \Redirect::to('/user-list');
    }
    public function edit($id) {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    public function remove(Request $request) {
        $user = User::find($request->id);
        if($user){
            $user->delete();
            
        }else{
            echo "<script>alert('User tidak ditemukan');</script>";
        }
        return \Redirect::to('/user-list');
    }
    public function update(Request $request, $id) {
        request()->validate([
            'image' => 'required',
            'name' => 'required',
            'email'=> 'required'
        ]);
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->function = $request->function;
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $user->image = $imageName;
        $user->save();

        request()->image->move(public_path('users'), $imageName);
        return \Redirect::to('/user-list');
    }
}
