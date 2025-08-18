@extends('admin.layout')
@section('content')

<div class="container mt-5">
    <h4>Edit Data Warga</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('warga-edit', Crypt::encrypt($warga->id)) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Warga</label>
            <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="{{ $warga->name }}">
                <span class="input-group-text"><i class="fa-solid fa-file-signature"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username Warga</label>
            <div class="input-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="{{ $warga->username }}">
                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password Warga</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="nohp" class="form-label">No HP Warga</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No HP" value="{{ $warga->nohp }}">
                <span class="input-group-text"><i class="fa-solid fa-square-phone"></i></span>
            </div>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat Warga</label>
            <div class="input-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Masukkan Alamat" value="{{ $warga->address }}">
                <span class="input-group-text"><i class="fa-solid fa-map-pin"></i></span>
            </div>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-info w-100 btn-sm">SIMPAN</button>
        </div>
    </form>
</div>

@endsection
