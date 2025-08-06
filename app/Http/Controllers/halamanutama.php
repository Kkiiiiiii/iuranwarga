<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $data['user'] = User::all();
        return view('admin.dashboard', $data);
    }
}
