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

    <button
        type="button"
        class="btn btn-primary btn-lg"
        data-bs-toggle="modal"
        data-bs-target="#pay"
    >
        Create Member
    </button>
    
    <div
        class="modal fade"
        id="pay"
        tabindex="-1"
        data-bs-backdrop="static"
        data-bs-keyboard="false"

        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Create Member
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
        <form action="{{ route('admin.dues_memberStore') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="users_id" class="form-label">nama</label>
            <select name="users_id" id="users_id" class="form-control">
                <option value="" disabled selected>Nama Warga</option>
                @foreach ($Warga as $item)
                    <option value="{{ $item->id }}">
                        {{  $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dues_categories_id" class="form-label">period</label>
            <select name="dues_categories_id" id="dues_categories_id" class="form-control">
                <option value="" disabled selected>Periode</option>
                @foreach ($Category as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->period }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-success w-100 btn-sm">SIMPAN</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
    {{-- <a href="{{ route('admin.dues_memberCreate') }}" class="btn btn-sm btn-info align-items-end">Tambah Data Member</a> --}}
    <table class="table table-striped table-hover">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Period</th>
                <th>Nominal</th>
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
            <td>
                {{-- <a href="{{ route('admin.paymentStore', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info" onclick="return confirm('Yakin {{ $item->user->name }} sudah membayar sebesar Rp.{{ $item->duesCategory->nominal }} ?')">Bayar</a> --}}
                <a href="{{ route('admin.dues_memberEdit', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{ route('admin.dues_memberDelete', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data dues member {{ $item->user->nama }} ini dihapus?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
