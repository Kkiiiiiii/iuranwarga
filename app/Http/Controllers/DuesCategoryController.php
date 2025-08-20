<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DuesCategoryController extends Controller
{
    //
    public function view()
    {
        $data['duesCategory'] = DuesCategory::all();
        return view('admin.dues_category.dues_category', $data);
    }

    public function create()
    {
       $data['Category'] = DuesCategory::all();
       return view("admin.dues_category.tambah_duesCategory", $data);
    }

    public function store(Request $request)
    {
         $validation = $request->validate([
            'period' => 'required|string|max:255',
            'nominal' => 'required|int',
            'status' => 'required|string',
        ]);

        DuesCategory::create($validation);
        return redirect()->route('admin.dues_category')->with('success', 'Berhasil menambah data dues_category');
    }

    public function edit(String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('Danger', $e->getMessage());
        }

        $data['Category'] = DuesCategory::find($id);
        return view('admin.dues_category.edit_duesCategory', $data);
    }

    public function update(Request $request, String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $validasi = $request->validate([
            'period' => 'required|string|max:255',
            'nominal' => 'required|int',
            'status' => 'required|string',
        ]);

        $category = DuesCategory::find($id);
        $category->update($validasi);
        return redirect(route('admin.dues_category'))->with('success', 'Data berhasil diubah');
    }

    public function delete(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $Category = DuesCategory::find($id);
        $Category->delete();

        return redirect(route('admin.dues_category'))->with('success', 'Data berhasil dihapus');
    }
    }
