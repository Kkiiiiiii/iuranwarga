@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <h4>Tambah Data Pembayaran</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.paymentStore') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="users_id" class="form-label">nama</label>
            <select name="users_id" id="users_id" class="form-control">
                <option value="" disabled selected>Nama Warga</option>
                @foreach ($Warga as $item)
                    <option value="{{ $item->id }}">
                        {{  $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <div class="input-group">
                <input type="nominal" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            </div>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-success w-100 btn-sm">Bayar</button>
        </div>
    </form>
</div>
@endsection
