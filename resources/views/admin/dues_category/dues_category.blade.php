@extends('admin.layout')
@section('content')
<div class="container">
    <a href="{{ route('admin.dues_categoryCreate') }}" class="btn btn-sm btn-info mt-5 align-items-end">Tambah Data Warga</a>
    <p>Data Petugas</p>
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
            @foreach ($dues_category as $item)
            <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->period }}</td>
            <td class="text-success">Rp.{{ $item->nominal }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="" class="btn btn-sm btn-warning">Edit</a>
                <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data warga ( ini dihapus?)')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

@endsection
