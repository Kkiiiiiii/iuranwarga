@extends('admin.layout')
@section('content')
<div class="container-fluid" style="padding-left: 40px">
    <div class="container-fluid justify-content-center">
        <div class="card mt-5" style="width: 500px">
            <div class="card-body">
                <h5 class="card-title">Pemasukan</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>

</div>
    <div class="table mt-5">
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
