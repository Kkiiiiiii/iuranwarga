@extends('warga.layout')
@section('content')
<div class="bg-primary text-white rounded-4 p-4 mb-5 shadow-sm mt-5">
    <div class="row align-items-center">
        <div class="col-md-8">
            @if (Auth::user())
            <h1 class="fw-bold">Halo, {{ Auth::user()->name }} 👋</h1>
            @endif
            <p class="lead">Selamat datang di <strong>IuranWarga</strong>! Di sini kamu bisa cek tagihan, bayar iuran, dan lihat riwayat pembayaran dengan mudah.</p>
            <div class="d-flex flex-wrap gap-3 mt-3">
                <a href="" class="btn btn-light text-primary fw-semibold shadow-sm">
                     Lihat Tagihan
                </a>
                <a href="{{ Auth::check() ? route('member.history') : route('login') }}" class="btn btn-outline-light fw-semibold">
                    📜 Riwayat Pembayaran
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <img src="{{ asset('assets/foto/person.jpg') }}" 
            class="rounded-circle img-fluid" 
            style="width: 200px; height: 200px; object-fit: cover;" 
            alt="Foto Profil">
    </div>
</div>
@endsection
