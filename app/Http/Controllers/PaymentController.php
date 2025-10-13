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
        $data['payment'] = Payment::with('user')->orderBy('id', 'desc')->get();
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
            'nominal_pembayaran' => 'required|numeric|min:1',
        ]);

        $member = DuesMembers::where('users_id', $validasi['users_id'])->first();
        if (!$member) {
            return redirect()->back()->with('danger', 'Data anggota atau kategori tidak ditemukan!');
        }

        $tanggalAwal = $member->registration_date;
        $tanggalAkhir = date('Y-m-d');
        $period = $member->duesCategory->period;

        $jumlahMinggu = $this->hitungJumlahMinggu($tanggalAwal, $tanggalAkhir, $period);
        $paymentCount = Payment::where('users_id', $member->users_id)->count();
        $sisaTagihan = $jumlahMinggu - $paymentCount;

        if ($sisaTagihan <= 0) {
            return redirect()->back()->with('success', 'Tagihan sudah lunas!');
        }

        $nominal_kategori = $member->duesCategory->nominal;
        $nominal_bayar = $validasi['nominal_pembayaran'];

        // Hitung berapa kali bisa bayar dengan nominal ini
        $jumlah_bayar = floor($nominal_bayar / $nominal_kategori);
        if ($jumlah_bayar == 0) {
            return redirect()->back()->with('danger', 'Nominal terlalu kecil untuk 1 pembayaran!');
        }

        // Jangan sampai bayar lebih dari sisa tagihan
        $jumlah_bayar = min($jumlah_bayar, $sisaTagihan);

        for ($i = 0; $i < $jumlah_bayar; $i++) {
            Payment::create([
                'users_id' => $member->users_id,
                'dues_categories_id' => $member->dues_categories_id,
                'nominal' => $nominal_kategori,
                'period' => $period,
                'petugas' => Auth::user()->name,
                'jumlah_tagihan' => $sisaTagihan - ($i + 1), // hitung dinamis
                'nominal_tagihan' => ($sisaTagihan - ($i + 1)) * $nominal_kategori,
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


        $data['payment'] = Payment::where('users_id', $id)->orderBy('id', 'desc')->get();
        $data['tagihan'] = Payment::where('users_id', $id)->orderBy('id', 'desc')->first();
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
}
