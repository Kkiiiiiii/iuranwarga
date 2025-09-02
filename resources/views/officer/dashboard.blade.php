@extends('officer.layout')
@section('content')
<div class="container mt-5  ">
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
    <hr>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Period</th>
                <th>Nominal</th>
                <th>Tanggal</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($payment as $item)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->period }}</td>
                <td class="text-success">Rp.{{ $item->nominal }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection
