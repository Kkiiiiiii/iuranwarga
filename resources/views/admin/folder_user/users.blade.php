@extends('admin.layout')
@section('content')
<div class="container">
    <table class="table table-striped table-hover">
            <thead class="table">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Nohp</th>
                    <th>Address</th>
                    <th>Period</th>
                    <th>Petugas</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @foreach ($warga as $item)
            <tbody>
                <tr>
                <td>1</td>
                <td>Kii123</td>
                <td>Kii</td>
                <td>9857847582475</td>
                <td>spa</td>
                <td>Mingguan</td>
                <td>Admin</td>
                <td class="text-success">5000</td>
                <td class="text-primary">Sudah Bayar</td>
                <td>
                    <a href="{{ route('warga-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('warga-delete') }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ({{ $item->name }} ini dihapus?)')">Delete</a>
                </td>
                </tr>
            </tbody>
            @endforeach
        </table>
</div>

@endsection
