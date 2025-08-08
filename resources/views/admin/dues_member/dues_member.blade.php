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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No</td>
                <td>Nama User</td>
                <td class="text-primary">Sudah Bayar</td>
                <a href="
                {{-- {{ route('warga-edit', Crypt::encrypt($item->id)) }} --}}
                 " class="btn btn-sm btn-warning">Edit</a>
                <a href="
                {{-- {{ route('warga-delete', Crypt::encrypt($item->id)) }} --}}
                 " class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ( ini dihapus?)')">Delete</a>
            </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
