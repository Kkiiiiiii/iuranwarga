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

        $member = DuesMembers::where('users_id',$id)->first();
        $payment = Payment::where('users_id', $member->id)->get();

        $tanggalAwal = "01-08-2025";
        $tanggalAkhir = date('d-m-Y');
        $jumlahMinggu = $this->hitungJumlahMinggu($tanggalAwal, $tanggalAkhir);

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
            return view('admin.payment.payment_detail', $data);
        }

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
