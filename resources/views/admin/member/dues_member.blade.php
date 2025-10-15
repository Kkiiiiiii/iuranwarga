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

    <h5 class="mt-3 pb-2">Data Member</h5>
    <hr>

   <div class="container mt-5">
    <button
        type="button"
        class="btn btn-primary btn-md"
        data-bs-toggle="modal"
        data-bs-target="#pay"
    >
        Create Member
    </button>

    <!-- Modal -->
    <div class="modal fade" id="pay" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('admin.dues_memberStore') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="users_id" class="form-label">Nama</label>
                            <select name="users_id" id="users_id" class="form-control select2-users">
                                <option value="" disabled selected>Pilih Warga</option>
                                @foreach ($Warga as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="dues_categories_id" class="form-label">Periode</label>
                            <select name="dues_categories_id" id="dues_categories_id" class="form-control select2-period">
                                <option value="" disabled selected>Pilih Periode</option>
                                @foreach ($Category as $item)
                                    <option value="{{ $item->id }}">{{ $item->period }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="registration_date" class="form-label">Registration Date</label>
                            <input type="date" name="registration_date" class="form-control">
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-success w-100 btn-sm">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    {{-- <a href="{{ route('admin.dues_memberCreate') }}" class="btn btn-sm btn-info align-items-end">Tambah Data Member</a> --}}
    <table class="table table-striped table-hover mt-4 pb-5">
        <thead class="table-warning">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Period</th>
                <th>Nominal</th>
                <th>Registration Date</th>
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
            <td>{{ $item->registration_date }}</td>
            <td>
                {{-- <a href="{{ route('admin.paymentStore', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info" onclick="return confirm('Yakin {{ $item->user->name }} sudah membayar sebesar Rp.{{ $item->duesCategory->nominal }} ?')">Bayar</a> --}}
                <a href="{{ route('admin.dues_memberEdit', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info"> 
                    <i class="fas fa-pen"></i> Edit</a>
                <a href="{{ route('admin.dues_memberDelete', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data dues member {{ $item->user->nama }} ini dihapus?')">
                     <i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#pay').on('shown.bs.modal', function () {
            $('.select2-users').select2({
                placeholder: "Pilih Nama Warga...",
                allowClear: true,
                dropdownParent: $('#pay'),
                width: '100%'
            });

            $('.select2-period').select2({
                placeholder: "Pilih Periode...",
                allowClear: true,
                dropdownParent: $('#pay'),
                width: '100%'
            });
        });
    });
</script>
@endpush


