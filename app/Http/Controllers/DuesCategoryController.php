<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuesCategoryController extends Controller
{
    //
    public function view(){
        return view("admin.dues_category.dues_category");
    }
}
