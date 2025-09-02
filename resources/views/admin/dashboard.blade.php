@extends('admin.layout')
@section('content')
<div class="container-fluid" style="padding-left: 40px">
</div>
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
@endsection
