<?php

namespace App\Http\Controllers;

use App\Models\DuesMembers;
use App\Models\Officer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class halamanutama extends Controller
{
    //
    public function home()
    {
        $data['payment'] = Payment::all();
        return view('warga.home', $data);
    }

    public function admin()
    {
        $data['payment'] = Payment::all();
        $data['user'] = User::all();
        $data['officer'] = Officer::all();
        $data['member'] = DuesMembers::all();
        return view('admin.dashboard', $data);
    }
}
