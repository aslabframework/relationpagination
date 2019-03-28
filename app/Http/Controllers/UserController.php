<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|min:5|max:100|unique:users',
            'address'=>'required|max:200',
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'avatar'=>'required|mimes:jpg,jpeg,png,bmp',
            'password'=>'required',
            'password_confirmation'=>'required|same:password'
        ]);

        $new_user = new User();
        $new_user->username = $request->get('username');
        $new_user->address = $request->get('address');
        $new_user->email = $request->get('email');
        $new_user->phone = $request->get('phone');
        $new_user->status = "ACTIVE";
        $new_user->password = Hash::make($request->get('password'));
        if ($request->file('avatar')) {
            $file = $request->file('avatar')->store('avatars','public');
            $new_user->avatar = $file;
        }
        $new_user->save();
        return redirect()->route('users.create')->with('status','User Succesfully Created');
        
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show',['user'=>$user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address'=>'required|max:200',
            'phone'=>'required',
            'status'=>'required',
            'avatar'=>'mimes:jpg,jpeg,png,bmp',
        ]);

        $update_user = User::findOrFail($id);
        $update_user->address = $request->get('address');
        $update_user->phone = $request->get('phone');
        $update_user->status = $request->get('status');
        if ($request->file('avatar')) {
            if ($update_user->avatar && file_exists(storage_path('app/public/'.$update_user->avatar))) {
                Storage::delete('public/'.$update_user->avatar);
            }
            $file = $request->file('avatar')->store('avatars','public');
            $update_user->avatar = $file;
        }

        $update_user->save();
        return redirect()->route('users.edit',['id'=>$id])->with('status','User succesfully updated');
    }

    public function destroy($id)
    {
       $user = User::findOrFail($id);
       if ($user->avatar && file_exists(storage_path('app/public/'.$user->avatar))) {
        Storage::delete('public/'.$user->avatar);
        }
        $user->delete();
       return redirect()->route('users.index')->with('status', 'User Successfully deleted');
    }
}
