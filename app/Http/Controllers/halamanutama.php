<?php

namespace App\Http\Controllers;

use App\Models\DuesMembers;
use App\Models\Officer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function officer()
    {
        $data['payment'] = Payment::orderBy('created_at', 'desc')->get();
        return view('officer.dashboard', $data);
    }

    public function history(){
        $id = Auth::user()->id;
        $data['payment'] = Payment::where('users_id', $id)->orderBy('created_at', 'desc')->get();
        $data['tagihan'] = Payment::where('users_id', $id)->orderBy('created_at', 'desc')->first();
        return view('warga.history',$data);
    }
}
