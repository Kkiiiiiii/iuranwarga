<?php

namespace App\Http\Controllers;

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
                return redirect()->intended(route(admin));
            }elseif(Auth::user()->level == 'warga'){
                return redirect()->intended(route(warga));
            }else {
                return redirect()->back()->with('Message', 'Login Gagal');
            }
        }

        return redirect()->back()->with('Message', 'Login Gagal');
    }
}
