@extends('admin.layout')
@section('content')
<div class="mt-5 pb-2 d-flex gap-5" style="padding-left: 40px">
      <div class="card bg-info" style="width: 300px;">
        <div class="card-body text-white d-flex justify-content-between align-items-center">
            <div class="text-start">
                <h6>Jumlah Warga</h6>
                <span>{{ $user->count() }}</span>
            </div>
            <i class="fa-solid fa-user" style="font-size:50px"></i>
        </div>
    </div>
        <div class="card bg-success" style="width: 300px;">
        <div class="card-body text-white d-flex justify-content-between align-items-center">
            <div class="text-start">
                <h6>Jumlah Petugas</h6>
               <span>{{ $officer->count() }}</span>
            </div>
            <i class="fa-solid fa-guarani-sign" style="font-size:50px"></i>
        </div>
    </div>
        {{-- <div class="card bg-success" style="width: 300px;">
        <div class="card-body text-white d-flex justify-content-between align-items-center">
            <div class="text-start">
                <h6>Jumlah Petugas</h6>
                <span>{{ $member->count() }}</span>
            </div>
            <i class="fa-solid fa-user-tie" style="font-size:50px"></i>
        </div>
    </div> --}}
</div>
<div class="container-fluid">
    <div class="table mt-5">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
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
                </tr>
            </thead>
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
                </tr>
            </tbody>
        </table>
    </div>

</div>
</div>
@endsection
