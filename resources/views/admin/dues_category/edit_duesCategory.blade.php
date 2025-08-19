@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <h4>Edit Data Dues_category</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dues_categoryUpdate', Crypt::encrypt( $Category->id )) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Period</label>
            <div class="input-group">
                <input type="text" class="form-control" id="period" name="period" placeholder="Masukkan periode" value="{{ $Category->period }}">
                <span class="input-group-text"><i class="fa-solid fa-database"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <div class="input-group">
                <input type="nominal" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal" value="{{ $Category->nominal }}">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <div class="input-group">
                <select class="form-select" name="status" id="status">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
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
