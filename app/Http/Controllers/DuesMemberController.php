<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
use App\Models\DuesMembers;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DuesMemberController extends Controller
{
    public function view()
    {
        $data['duesMember'] = DuesMembers::all();
        return view('admin.member.dues_member', $data);
    }

    public function create()
    {
       $data['Warga'] = User::all();
       $data['Category'] = DuesCategory::all();
       return view("admin.member.tambah_duesMember", $data);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'users_id' => 'required',
            'dues_categories_id' => 'required',
        ]);

        DuesMembers::create($validation);
        return redirect()->route('admin.dues_member')->with('success', 'Berhasil menambah data Member');
    }

    public function edit(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('Danger', $e->getMessage());
        }

        $data['Member'] = DuesMembers::find($id);
        $data['Warga'] = User::all();
        $data['Category'] = DuesCategory::all();
        return view('admin.member.edit_duesMember', $data);
    }

    public function update(Request $request, String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $validation = $request->validate([
            'dues_categories_id' => 'required',
        ]);
        
        $member = DuesMembers::find($id);
        $member->update($validation);
        return redirect(route('admin.dues_member'))->with('success', 'Data berhasil diubah');
    }

    public function delete(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $Member = DuesMembers::find($id);
        $Member->delete();
        
        return redirect(route('admin.dues_member'))->with('success', 'Data berhasil dihapus');
    }
}
