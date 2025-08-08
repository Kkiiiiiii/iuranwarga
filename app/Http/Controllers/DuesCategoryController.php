<?php

namespace App\Http\Controllers;

use App\Models\dues_category;
use Illuminate\Http\Request;

class DuesCategoryController extends Controller
{
    //
    public function view()
    {
        $dues_category = dues_category::all();
        return view('admin.dues_category.dues_category', compact('dues_category'));
    }

    public function create()
    {
       $data['Category'] = dues_category::all();
       return view("admin.dues_category.tambah_duesCategory", $data);
    }

    public function store(Request $request)
    {
         $validation = $request->validate([
            'id' => 'nullable',
            'period' => 'required|string|max:255',
            'nominal' => 'required|int',
            'status' => 'required|string',
        ]);

        dues_category::create($validation);
        return redirect()->route('admin.dues_category')->with('Message', 'Tambah dues_Category Berhasil');
    }

    public function delete()
    {

    }
}
