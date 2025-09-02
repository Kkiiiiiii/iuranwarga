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
        $data['Warga'] = DuesMembers::all();
        $data['payment'] = Payment::with('user')->orderBy('created_at', 'desc')->get();
        if (Auth::user()->level == 'admin') {
            return view('admin.payment.payment', $data);
        }else if (Auth::user()->level == 'officer') {
            return view('officer.payment.payment', $data);
        }
    }


    public function store(request $request)
    {
        $validasi = $request->validate([
            'users_id' => 'required',
            'nominal_pembayaran' => 'required',
        ]);
        $member = DuesMembers::where('users_id', $validasi['users_id'])->first();
        if (!$member) {
            return redirect()->back()->with('danger', 'Data anggota atau kategori tidak ditemukan!');
        }
        $tanggalAwal = $member->created_at->format('d-m-Y');
        $tanggalAkhir = date('d-m-Y');
        $period = $member->duesCategory->period;
        $jumlahMinggu = $this->hitungJumlahMinggu($tanggalAwal, $tanggalAkhir, $period);
        $payment = Payment::where('users_id', $member->users_id)->get();

        if($payment->count() > $jumlahMinggu){
            $jumlah_tagihan = "Tidak ada";
            $nominal_tagihan = 0;
        }else{
            $jumlah_tagihan = $jumlahMinggu - $payment->count();
            if($jumlah_tagihan == 0) {
                $jumlah_tagihan = "Tidak ada";
            }
            $nominal_tagihan = ($jumlahMinggu - $payment->count()) * $member->duesCategory->nominal;
        }

        $nominal_bayar = $request->nominal_pembayaran;
        $nominal_kategori = $member->duesCategory->nominal;

        $jumlah_bayar = $request->nominal_pembayaran;
        $nominal_kategori = $member->duesCategory->nominal;

        $jumlah_bayar = floor($nominal_bayar / $nominal_kategori);
        for($i = 0; $i < $jumlah_bayar; $i++){
            Payment::create([
                'users_id' => $member->users_id,
                'dues_categories_id' => $member->dues_categories_id,
                'nominal' => $nominal_kategori,
                'period'=> $member->duesCategory->period,
                'petugas' => Auth::user()->name,
                'jumlah_tagihan' => $jumlah_tagihan,
                'nominal_tagihan' => $nominal_tagihan,
            ]);
        }

    //     $data['jumlah_tagihan'] = $jumlah_tagihan;
    //     $data['nominal_tagihan'] = $nominal_tagihan;
    //     $data['payment'] = $payment;
    //     $data['member'] = $member;

    // payment::create( $data );
    if (Auth::user()->level == 'admin') {
        return redirect()->route('admin.payment')->with('success', 'Berhasil melakukan pembayaran');
    }else if (Auth::user()->level == 'officer') {
        return redirect()->route('officer.payment')->with('success', 'Berhasil melakukan pembayaran');
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
        $user_id = $payment->users_id;
        $payment->delete();

        if (Auth::user()->level == 'admin') {
            return redirect(route('admin.paymentDetail', ['id' => Crypt::encrypt( $user_id )]))->with('success', 'Data berhasil dihapus');
        }else if (Auth::user()->level == 'officer') {
            return redirect(route('officer.paymentDetail', ['id' => Crypt::encrypt( $user_id )]))->with('success', 'Data berhasil dihapus');
        }

    }

    public function detail(Request $request,String $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }


        $data['payment'] = Payment::where('users_id', $id)->orderBy('created_at', 'desc')->get();
        $data['tagihan'] = Payment::where('users_id', $id)->orderBy('created_at', 'desc')->first();
        if ($data['payment'] == null || $data['tagihan'] == null) {
            if (Auth::user()->level == 'admin') {
                return redirect()->route('admin.payment')->with('success', 'Data berhasil dihapus');
            }else if (Auth::user()->level == 'officer') {
                return redirect()->route('officer.payment')->with('success', 'Data berhasil dihapus');
            }
        }
        if (Auth::user()->level == 'admin') {
            return view('admin.payment.payment_detail', $data);
        }else if (Auth::user()->level == 'officer') {
            return view('officer.payment.payment_detail', $data);
        }

    }

    // public function create()
    // {
    //    $data['Warga'] = User::all();
    //    $data['Category'] = DuesCategory::all();
    //    return view("admin.payment.tambah_payment", $data);
    // }

    function hitungJumlahMinggu($tanggalAwal,$tanggalAkhir, $period){
        $awal = new DateTime($tanggalAwal);
        $akhir = new DateTime($tanggalAkhir);

        if($akhir < $awal){
            return "Tanggal Akhir harus lebih besar dari tanggal Awal!";
        }
        $selisih = $awal->diff($akhir)->days;
        if($period == 'mingguan')
        {
            $jumlahminggu = ceil($selisih /7);
        }else if($period == 'bulanan')
        {
            $jumlahminggu = ceil($selisih /28);
        }else if($period == 'tahunan')
        {
            $jumlahminggu = ceil($selisih /365);
        }else
        {
            return redirect()->back()->with('danger', 'Periode tidak ditemukan!');
        }

        return $jumlahminggu;
    }
}
