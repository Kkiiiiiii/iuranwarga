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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-success"></td>
            <td class="text-primary"></td>
            <td>
                <a href="" class="btn btn-sm btn-warning">Edit</a>
                <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ( ini dihapus?)')">Delete</a>
            </td>
        </tr>
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
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-success"></td>
            <td class="text-primary"></td>
            <td>
                <a href="" class="btn btn-sm btn-warning">Edit</a>
                <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga (ini dihapus?)')">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

@endsection
