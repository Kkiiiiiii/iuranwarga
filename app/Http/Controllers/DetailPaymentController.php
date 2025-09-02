<?php

namespace App\Http\Controllers;

use App\Models\DuesMembers;
use App\Models\Payment;
use DateTime;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DetailPaymentController extends Controller
{
    //
    public function payment_detail(Request $request,String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $data['payment'] = Payment::where('users_id', $id)->orderBy('created_at', 'desc')->get();
        $data['tagihan'] = Payment::where('users_id', $id)->orderBy('created_at', 'desc')->first();
        return view('admin.payment.payment_detail', $data);
    }

}
