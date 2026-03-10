<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

       User::create([
    'Username' => $request->username,
    'Password' => bcrypt($request->password),
    'Email' => $request->email,
    'NamaLengkap' => $request->nama,
    'Alamat' => $request->alamat
]);

        return redirect('/login');
    }

  public function login(Request $request)
{

    // LOGIN ADMIN DARI KODE
    if($request->username == "admin" && $request->password == "admin123"){

        session([
            'username' => 'admin',
            'role' => 'admin'
        ]);

        return redirect('/admin'); // ke dashboard admin
    }

    // LOGIN USER DARI DATABASE
    $user = User::where('Username',$request->username)->first();

    if($user && Hash::check($request->password,$user->Password)){

        session([
            'userid'=>$user->UserID,
            'username'=>$user->Username,
            'role'=>'user'
        ]);

        return redirect('/user'); 
    }

    return back()->with('error','Login gagal');

    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}