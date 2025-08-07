@extends('admin.layout')
@section('content')
<div class="container">
    <a href="{{ route('admin.wargaCreate') }}" class="btn btn-sm btn-info mt-5 align-items-end">Tambah Data Warga</a>
    <p>Data Petugas</p>
    <table class="table table-striped table-hover">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Nohp</th>
                <th>Address</th>
                <th>Petugas</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @php
                    $noadmin = 1;
                @endphp
                @foreach ($warga as $item)
                @if($item->level == 'admin')
            <td>{{ $noadmin++}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->nohp }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->level }}</td>
            <td class="text-success">5000</td>
            <td class="text-primary">Sudah Bayar</td>
            <td>
                <a href="{{ route('warga-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('warga-delete', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ({{ $item->name }} ini dihapus?)')">Delete</a>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
    </table>    
    <p>Data Warga</p>
    <table class="table table-striped table-hover">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Nohp</th>
                <th>Address</th>
                <th>Petugas</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $nowarga = 1;
            @endphp
            @foreach ($warga as $item)
            @if($item->level == 'warga')
            <tr>
            <td>{{ $nowarga++}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->nohp }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->level }}</td>
            <td class="text-success">5000</td>
            <td class="text-primary">Sudah Bayar</td>
            <td>
                <a href="{{ route('warga-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('warga-delete', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ({{ $item->name }} ini dihapus?)')">Delete</a>
            </td>
        </tr>
        @endif
        @endforeach
        </tbody>
    </table>
</div>

@endsection
