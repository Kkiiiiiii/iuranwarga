@extends('warga.layout')
@section('content')
<div class="container m-auto">
    <div class="p-5 mb-4 bg-utama rounded-3 mt-3">
        <div class="container py-5">
            <h1 class="display-5 fw-medium text-white">IuranWarga</h1>
            <p class="col-md-8 fs-4">
              IuranWarga adalah apk yang diguanakan untuk memudahkan warga dalam
              Melakukan pembayaran iuran.
            </p>
        </div>
    </div>
    <div class="container py-5 bg-utama">
        <div class="d-flex align-content-center justify-content-between" style="padding-left: 24px;padding-right: 24px">
            <div class="container">
                <div class="d-flex">
                    <h4>Iuran Minggu Ini,</h4>
                    <h4 class="text-white">Sudah Selesai</h4>
                </div>
                <span class="text-success">Rp.50000</span>
            </div>
            <div class="align-items-end" style="width: 100px">
                <button class="btn btn-sm btn-warning align-content-end">Lihat Detail</button>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Nama Warga</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Petugas</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>kii123</td>
                    <td>5000</td>
                    <td>Sudah Bayar</td>
                    <td>Admin123</td>
                    <td>2025-07-05</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
