@extends('admin.layout')
@section('content')
<div class="container">
    <a href="{{ route('admin.wargaCreate') }}" class="btn btn-md btn-primary mt-5 align-items-end text-white">Tambah Data Warga</a>
    <h5 class="mt-3 pb-2">Data Admin</h5>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Nohp</th>
                <th>Address</th>
                <th>Level</th>
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
            <td>
                <a href="{{ route('warga-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-success" onclick="return confirm('Yakin memberhentikan {{ $item->name }} dari admin')">Berhentikan Admin</a>
                <a href="{{ route('warga-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('warga-delete', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ({{ $item->name }} ini dihapus?)')">Delete</a>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
    </table>
    <h5 class="mb-3 pb-2">Data Petugas</h5>
    <table class="table table-striped table-hover">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Nohp</th>
                <th>Address</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @php
                    $noadmin = 1;
                @endphp
                @foreach ($warga as $item)
                @if($item->level == 'officer')
            <td>{{ $noadmin++}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->nohp }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->level }}</td>
            <td>
                <a href="{{ route('warga-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-success" onclick="return confirm('Yakin memberhentikan {{ $item->name }} dari petugas')">Berhentikan Petugas</a>
                <a href="{{ route('warga-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('warga-delete', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ({{ $item->name }} ini dihapus?)')">Delete</a>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
    </table>
    <h5 class="mt-3 pb-2">Data Warga</h5>
    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Nohp</th>
                <th>Address</th>
                <th>Level</th>
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
            <td>
                <a href="{{ route('warga-update', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-success" onclick="return confirm('Yakin menjadikan {{ $item->name }} sebagai petugas')">Jadikan Petugas</a>
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
