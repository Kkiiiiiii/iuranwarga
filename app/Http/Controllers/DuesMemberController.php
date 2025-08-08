<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuesMemberController extends Controller
{
    //
    public function view(){
        return view("admin.dues_member.dues_member");
    }
}
