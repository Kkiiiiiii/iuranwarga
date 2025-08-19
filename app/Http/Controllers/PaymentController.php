<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
use App\Models\DuesMembers;
use App\Models\Payment;
use App\Models\User;
use Auth;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function view()
    {
        $data['payment'] = Payment::all();
        return view('admin.payment.payment', $data);
    }

    
    public function store(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $member = DuesMembers::find($id);

        $data = [
            'users_id' => $member->users_id,
            'period' => $member->duesCategory->period,
            'dues_categories_id' => $member->dues_categories_id,
            'petugas' => Auth::user()->name,
        ];

        payment::create( $data );
        return redirect()->route('admin.payment')->with('success', 'Berhasil melakukan pembayaran');
    }


    public function delete(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
        
        $payment = Payment::find($id);
        $payment->delete();
        
        return redirect(route('admin.payment'))->with('success', 'Data berhasil dihapus');
    }

    // public function create()
    // {
    //    $data['Warga'] = User::all();
    //    $data['Category'] = DuesCategory::all();
    //    return view("admin.payment.tambah_payment", $data);
    // }
    

    // public function edit(String $id){
    //     try {
    //         $id = Crypt::decrypt($id);
    //     } catch (DecryptException $e) {
    //         return redirect()->back()->with('Danger', $e->getMessage());
    //     }

    //     $data['Member'] = DuesMembers::find($id);
    //     $data['Warga'] = User::all();
    //     $data['Category'] = DuesCategory::all();
    //     return view('admin.member.edit_duesMember', $data);
    // }

    // public function update(Request $request, String $id){
    //     try {
    //         $id = Crypt::decrypt($id);
    //     } catch (DecryptException $e) {
    //         return redirect()->back()->with('danger', $e->getMessage());
    //     }

    //     $validation = $request->validate([
    //     'dues_categories_id' => 'required',
    //     ]);
        
    //     $member = DuesMembers::find($id);
    //     $member->update($validation);
    //     return redirect(route('admin.dues_member'))->with('success', 'Data berhasil diubah');
    // }

}
