@extends('admin.layout')
@section('content')
<div class="container mt-5">
    @php
        $jumlahwarga = $user->where('level', 'warga')->count();
    @endphp
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
        $proseslevel = [];
    @endphp
    @if ($jumlahwarga > 0)
        @foreach ($user as $lvl)
            @if (!in_array($lvl->level, $proseslevel))
                @if ($lvl->level == 'admin')
                    <h5 class="mt-3 pb-2">Data Admin</h5>
                @elseif ($lvl->level == 'officer')
                    <h5 class="mt-3 pb-2">Data Petugas</h5>
                @elseif ($lvl->level == 'warga')
                    <a href="{{ route('admin.wargaCreate') }}" class="btn btn-md btn-primary mt-5 align-items-end text-white">Tambah Data Warga</a>
                    @endif
                    @endif
                    @php
                $proseslevel[] = $lvl->level;
                @endphp
        @endforeach
    @else
        <a href="{{ route('admin.wargaCreate') }}" class="btn btn-md btn-primary mt-5 align-items-end text-white">Tambah Data Warga</a>
    @endif
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
            @foreach ($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->nohp }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->level }}</td>
                <td>
                    <a href="{{ route('warga-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('warga-delete', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ({{ $item->name }} ini dihapus?)')">Delete</a>
                    @if ($item->level == 'warga')
                        <a href="{{ route('warga.NaikJabatan', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning" onclick="return confirm('Yakin menjadikan ({{ $item->name }} sebagai petugas?)')">Jadikan Petugas</a>
                    @elseif ($item->level == 'officer')
                        <a href="{{ route('warga.TurunJabatan', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning" onclick="return confirm('Yakin memberhentikan ({{ $item->name }} dari petugas?)')">Berhentikan Petugas</a>
                    @endif
                    {{-- <a href="{{ route('warga.TurunJabatan', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-success" onclick="return confirm('Yakin memberhentikan {{ $item->name }} dari admin')">Berhentikan Admin</a> --}}
                </td>
            </tr>
            @endforeach
    </tbody>
</div>

@endsection
