@extends('warga.layout')
@section('content')
<div class="container mt-5">
    {{-- Alerts --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('danger'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h3 class="mb-4 fw-bold text-primary">History Pembayaran</h3>
    <hr>

    {{-- Kapsul Tagihan --}}
    <div class="mb-4 d-flex flex-wrap gap-2">
        <div class="badge bg-primary text-white py-2 px-3 rounded-pill shadow">
            Jumlah: {{$tagihan->jumlah_tagihan > 0 ? $tagihan->jumlah_tagihan : 'Lunas'}}
        </div>
        <div class="badge bg-success text-white py-2 px-3 rounded-pill shadow">
            Nominal: {{$tagihan->nominal_tagihan > 0 ? number_format($tagihan->nominal_tagihan,0,",",".") : 'Lunas'}}
        </div>
    </div>

    @if (!$tagihan->jumlah_tagihan)
        {{ route('home') }}
    @endif

    {{-- Tabel Pembayaran dalam Card --}}
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Detail Pembayaran</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:5%">No</th>
                        <th style="width:25%">Periode</th>
                        <th style="width:25%">Nominal</th>
                        <th style="width:25%">Tanggal</th>
                        <th style="width:20%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payment as $item)
                    <tr class="@if($loop->even) table-secondary @endif">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucfirst($item->period) }}</td>
                        <td class="text-success fw-bold">Rp. {{ number_format($item->nominal,0,",",".") }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>
                            <span class="badge @if($item->nominal > 0) bg-success @else bg-warning text-dark @endif">
                                @if($item->nominal > 0) Lunas @else Belum Lunas @endif
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada pembayaran</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
