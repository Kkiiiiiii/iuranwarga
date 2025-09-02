@extends('officer.layout')
@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif(session('danger'))
    <div class="alert alert-danger alert-dismissible">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @php
        $no = 1;
    @endphp

    {{-- <a href="{{ route('admin.paymentCreate') }}" class="btn btn-sm btn-info align-items-end">Tambah Data Pembayaran</a> --}}
    <p>Data Pembayaran</p>
    <button
        type="button"
        class="btn btn-primary btn-lg"
        data-bs-toggle="modal"
        data-bs-target="#pay"
    >
        Pay
    </button>

    <div
        class="modal fade"
        id="pay"
        tabindex="-1"
        data-bs-backdrop="static"
        data-bs-keyboard="false"

        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Payment Form
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('officer.paymentStore') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="users_id" class="form-label">nama</label>
            <select name="users_id" id="users_id" class="form-control">
                <option value="" disabled selected>Nama Warga</option>
                @foreach ($Warga as $item)
                    <option value="{{ $item->users_id }}">
                        {{ $item->user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal_pembayaran" class="form-label">Nominal</label>
            <div class="input-group">
                <input type="number" class="form-control" id="nominal_pembayaran" name="nominal_pembayaran" placeholder="Masukkan Nominal">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success w-100 btn-sm">Bayar</button>
    </div>
</form>
</div>
</div>
</div>

    <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId"),
            options,
        );
    </script>

    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Period</th>
                <th>Nominal</th>
                <th>Jumlah Tagihan</th>
                <th>Nominal Tagihan</th>
                <th>Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $prosesUser = [];
            @endphp
            @foreach ($payment as $item)
            @if (!in_array($item->users_id, $prosesUser))
                <td>{{ $no++ }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->period }}</td>
                <td class="text-success">Rp.{{ $item->nominal }}</td>
                <td>{{ $item->jumlah_tagihan }}</td>
                <td>{{ $item->nominal_tagihan }}</td>
                <td>{{ $item->petugas }}</td>
                <td>
                    {{-- <a href="{{ route('admin.dues_memberEdit', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info">Edit</a> --}}
                    {{-- <a href="{{ route('admin.paymentDelete', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data dues member {{ $item->user->nama }} ini dihapus?')">Delete</a> --}}
                    <a href="{{ route('officer.paymentDetail', ['id' => Crypt::encrypt($item->users_id)]) }}" class="btn btn-sm btn-primary">Detail Pembayaran</a>
                </td>
            </tr>
            @php
                $prosesUser[] = $item->users_id;
            @endphp
            @endif
            @endforeach
    </tbody>
    </table>
</div>
@endsection
