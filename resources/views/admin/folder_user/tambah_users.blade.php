@extends('admin.layout')
@section('content')

<div class="container mt-5">
    <h4>Tambah Data Warga</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.wargaStore') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Warga</label>
            <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                <span class="input-group-text"><i class="fa-solid fa-file-signature"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username Warga</label>
            <div class="input-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
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
                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No HP">
                <span class="input-group-text"><i class="fa-solid fa-square-phone"></i></span>
            </div>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat Warga</label>
            <div class="input-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Masukkan Alamat">
                <span class="input-group-text"><i class="fa-solid fa-map-pin"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level Akses</label>
            <div class="input-group">
                <select class="form-select" name="level" id="level">
                    <option value="admin">officer</option>
                    <option value="warga">Warga</option>
                </select>
                <span class="input-group-text"><i class="fa-solid fa-database"></i></span>
            </div>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-info w-100 btn-sm">SIMPAN</button>
        </div>
    </form>
</div>

@endsection
