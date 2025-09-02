@extends('admin.layout')
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
    <h3 class="mt-5">Payment Detail</h3><br>
    <h4>Jumlah Tagihan : {{$tagihan->jumlah_tagihan}}</h4>
    <h5>Nominal Tagihan : {{$tagihan->nominal_tagihan}}</h5>
    <hr>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Period</th>
                <th>Nominal</th>
                <th>Tanggal</th>
                <th>Aksi</th>
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
                <td>
                   <a href="{{ route('admin.paymentDelete', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data dues member {{ $item->user->nama }} ini dihapus?')">Delete</a>
              </td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection

