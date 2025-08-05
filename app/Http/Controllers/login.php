<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    //
    public function login(Request $request)
    {
        return view("login.login");
    }

    public function auth(Request $request){
        $validasi = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validasi)) {
            if(Auth::user()->level == 'admin'){
                return redirect()->intended(route('admin'));
            }elseif(Auth::user()->level == 'warga'){
                return redirect()->intended(route('home'));
            }else {
                return redirect()->back()->with('Message', 'Login Gagal');
            }
        }
    }

    public function regis(){
        return view("login.register");
    }

    public function registrasi(Request $request) {
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
            'nohp' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'level' => 'warga',
        ]);

        $validation['password'] = bcrypt($validation['password']);

        User::create($validation);
        return redirect()->route('login')->with('Message', 'Registrasi Berhasil');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('Message', 'Logout Berhasil');
    }
}
