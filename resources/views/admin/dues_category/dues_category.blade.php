@extends('admin.layout')
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

    <a href="{{ route('admin.dues_categoryCreate') }}" class="btn btn-sm btn-info align-items-end">Tambah Data Kategori</a>
    <p>Data Kategori</p>
    <table class="table table-striped table-hover">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Period</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($duesCategory as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->period }}</td>
            <td class="text-success">Rp.{{ $item->nominal }}</td>
            <td>
                @if ($item->status == 1)
                Aktif
                @elseif ($item->status == 0)
                Tidak Aktif
                @endif
            </td>
            <td>
                <a href="{{ route('admin.dues_categoryEdit', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{ route('admin.dues_categoryDelete', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data period {{ $item->period }} ini dihapus?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
