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

    <form action="{{ route('admin.dues_memberStore') }}" method="POST" enctype="multipart/form-data">
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
            <label for="dues_categories_id" class="form-label">period</label>
            <select name="dues_categories_id" id="dues_categories_id" class="form-control">
                <option value="" disabled selected>Periode</option>
                @foreach ($Category as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->period }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-success w-100 btn-sm">SIMPAN</button>
        </div>
    </form>
</div>
@endsection
