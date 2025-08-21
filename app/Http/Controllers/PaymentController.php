<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
use App\Models\DuesMembers;
use App\Models\Payment;
use App\Models\User;
use DateTime;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
    public function view()
    {
        $data['Warga'] = User::all();
        $data['payment'] = Payment::all();
        return view('admin.payment.payment', $data);
    }


    public function store(request $request)
    {
        $validasi = $request->validate([
            'users_id' => 'required',
            'nominal_pembayaran' => 'required',
        ]);
        $member = DuesMembers::where('users_id', $validasi['users_id'])->first();
        $tanggalAwal = "01-08-2025";
        $tanggalAkhir = date('d-m-Y');
        $jumlahMinggu = $this->hitungJumlahMinggu($tanggalAwal, $tanggalAkhir);
        $payment = Payment::where('users_id', $member->id)->get();

        if($payment->count() > $jumlahMinggu){
            $jumlah_tagihan = "Tidak ada";
            $nominal_tagihan = 0;
        }else{
            $jumlah_tagihan = $jumlahMinggu - $payment->count();
            $nominal_tagihan = ($jumlahMinggu - $payment->count()) * $member->duesCategory->nominal;
        }

        if($request->bayar){
            $nominal_bayar = $request->nominal;
            $nominal_kategori = $member->duesCategory->nominal;

            $jumlah_bayar = $request->nominal;
            $nominal_kategori = $member->duesCategory->nominal;

            $jumlah_bayar = $nominal_bayar / $nominal_kategori;
            for($i = 0; $i < $jumlah_bayar; $i++){
                Payment::create([
                    'users_id' => $member->users_id,
                    'nominal' => $nominal_kategori,
                    'period'=> $member->duesCategory->period,
                    'petugas' => Auth::user()->id
                ]);
            }

            $data['jumlah_tagihan'] = $jumlah_tagihan;
            $data['nominal_tagihan'] = $nominal_tagihan;
            $data['payment'] = $payment;
            $data['member'] = $member;

        payment::create( $data );
        return redirect()->route('admin.payment')->with('success', 'Berhasil melakukan pembayaran');
    }
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

    public function detail(){
        return view('admin.payment.payment_detail');
    }

    // public function create()
    // {
    //    $data['Warga'] = User::all();
    //    $data['Category'] = DuesCategory::all();
    //    return view("admin.payment.tambah_payment", $data);
    // }


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

    function hitungJumlahMinggu($tanggalAwal,$tanggalAkhir){
        $awal = new DateTime($tanggalAwal);
        $akhir = new DateTime($tanggalAkhir);

        if($akhir < $awal){
            return "Tanggal Akhir harus lebih besar dari tanggal Awal!";
        }
        $selisih = $awal->diff($akhir)->days;

        $jumlahminggu = ceil($selisih /7);

        return $jumlahminggu;
    }

}
