@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <h4>Tambah Data Dues_category</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dues_categoryStore') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <div class="input-group">
                <input type="number" class="form-control" id="id" name="id" placeholder="Masukkan ID">
                <span class="input-group-text"><i class="fa-solid fa-file-signature"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Period</label>
            <div class="input-group">
                    <select class="form-select" name="period" id="period">
                    <option value="mingguan">Mingguan</option>
                    <option value="bulanan">Bulanan</option>
                    <option value="tahunan">Tahunan</option>
                </select>
                <span class="input-group-text"><i class="fa-solid fa-database"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <div class="input-group">
                <input type="nominal" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <div class="input-group">
                <select class="form-select" name="status" id="status">
                    <option value="sudah bayar">Sudah Bayar</option>
                    <option value="belum bayar">Belum Bayar</option>
                </select>
                <span class="input-group-text"><i class="fa-solid fa-database"></i></span>
            </div>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-success w-100 btn-sm">SIMPAN</button>
        </div>
    </form>
</div>
@endsection
