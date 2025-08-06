<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsercontroller extends Controller
{
    public function view(){
        $data['warga'] = User::all();
        return view('admin.folder_user.users', $data);
    }

    public function create(){
        $data['warga'] = User::all();
        return view("admin.folder_user.tambah_users", $data);
    }

    public function store(Request $request) {
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
            'nohp' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'level' => 'required|string',
        ]);

        $validation['password'] = bcrypt($validation['password']);

        User::create($validation);
        return redirect()->route('admin.wargaTab')->with('Message', 'Registrasi Berhasil');
    }
}
