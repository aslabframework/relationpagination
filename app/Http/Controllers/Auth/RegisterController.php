<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'=>'required|min:5|max:100|unique:users',
            'address'=>'required|max:200',
            'phone'=>'required',
            'avatar'=>'required|mimes:jpg,jpeg,png,bmp',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $new_user = new User();
        $new_user->username = $data['username'];
        $new_user->address = $data['address'];
        $new_user->email = $data['email'];
        $new_user->phone = $data['phone'];
        $new_user->status = "ACTIVE";
        $new_user->password = Hash::make($data['password']);
        if ($data['avatar']) {
            $file = $data['avatar']->store('avatars','public');
            $new_user->avatar = $file;
        }
        $new_user->save();
        return $new_user;
    }
}
