<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class halamanutama extends Controller
{
    //
    public function home()
    {
        return view('warga.home');
    }

    public function admin()
    {
        return view('admin.dashboard');
    }
}
