<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\Cast\String_;

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

    public function edit(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $data['warga'] = User::find($id);
        return view('admin.folder_user.edit_user', $data);
    }

    public function update(Request $request,String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $user = User::find($id);

        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|max:500|string',
            'nohp' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'level' => 'required|string',
        ]);

        if ($request->filled('password')) {
            $validation['password'] = bcrypt($validation['password']);
        }else {
            $validation['password'] = $user->password;
        }

        $user = User::find($id);
        $user->update($validation);
        return redirect()->route('admin.wargaTab');
    }

    public function delete(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.wargaTab');
    }
}
