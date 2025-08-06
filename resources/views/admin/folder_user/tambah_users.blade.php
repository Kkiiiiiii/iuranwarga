@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <h4>Tambah data warga</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
             <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.wargaStore') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-2">
            <div class="input-group">
                <label for="name" class="form-label">Nama Warga:</label>
                <input type="text" class="form-control" id="name" placeholder="Masukan Nama" name="name">
                <div class="input-group-text">
                    <span><i class="fa-solid fa-file-signature"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-3 mt-2">
            <div class="input-group">
                <label for="username" class="form-label">Username Warga:</label>
                <input type="text" class="form-control" id="username" placeholder="Masukan Userame" name="username">
                <div class="input-group-text">
                    <span><i class="fa-regular fa-user"></i></span>
                </div>
            </div>
        </div>
         <div class="mb-3 mt-2">
            <div class="input-group">
                <label for="password" class="form-label">Password Warga:</label>
                <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password">
                <div class="input-group-text">
                    <span><i class="fa-solid fa-lock"></i></span>
                </div>
            </div>
        </div>
           <div class="mb-3 mt-2">
            <div class="input-group">
                <label for="nohp" class="form-label">Nohp Warga:</label>
                <input type="nohp" class="form-control" id="nohp" placeholder="Masukan No HP" name="nohp">
                <div class="input-group-text">
                    <span><i class="fa-solid fa-square-phone"></i></span>
                </div>
            </div>
        </div>
         <div class="mb-3 mt-2">
            <div class="input-group">
                <label for="Address" class="form-label">Alamat Warga:</label>
                <input type="Address" class="form-control" id="Address" placeholder="Masukan Alamat" name="address">
                <div class="input-group-text">
                    <span><i class="fa-solid fa-map-pin"></i></span>
                </div>
            </div>
        </div>
          <div class="mb-3 mt-2">
            <div class="input-group">
                <label for="level" class="form-label">Alamat Warga:</label>
                <select name="level" id="level">
                    <option value="admin">Admin</option>
                    <option value="warga">Warga</option>
                </select>
                <div class="input-group-text">
                    <span><i class="fa-solid fa-database"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-3 mt-3 text-center">
            <input type="submit" class="btn btn-sm btn-info w-100" value="SIMPAN">
        </div>
    </form>
</div>

@endsection
