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

    <a href="{{ route('admin.dues_memberCreate') }}" class="btn btn-sm btn-info align-items-end">Tambah Data Member</a>
    <p>Tagihan</p>
    <table class="table table-striped table-hover">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Period</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
         <tbody>
            @foreach ($duesMember as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->duesCategory->period }}</td>
            <td class="text-success">Rp.{{ $item->duesCategory->nominal }}</td>
            <td>{{ $item->status}}</td>
            <td>
                <a href="{{ route('admin.paymentStore', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info" onclick="return confirm('Yakin {{ $item->user->name }} sudah membayar sebesar Rp.{{ $item->duesCategory->nominal }} ?')">Bayar</a>
                <a href="{{ route('admin.dues_memberEdit', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{ route('admin.dues_memberDelete', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data dues member {{ $item->user->nama }} ini dihapus?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
