@extends('admin.layout')
@section('content')
<style>
    .card-box {
        transform: translateY(0);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .card-box:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 10px 15px rgba(0,0,0,0.3);
        cursor: pointer;
    }

</style>
<div class="mt-5 pb-2 d-flex gap-5" style="padding-left: 40px">
      <div class="card bg-info card-box" style="width: 300px;">
        <div class="card-body text-white d-flex justify-content-between align-items-center">
            <div class="text-start">
                <h6>Jumlah Warga</h6>
                <span>{{ $user->count() }}</span>
            </div>
            <i class="fa-solid fa-user" style="font-size:50px"></i>
        </div>
    </div>
        <div class="card bg-success card-box" style="width: 300px;">
        <div class="card-body text-white d-flex justify-content-between align-items-center">
            <div class="text-start">
                <h6>Jumlah Petugas</h6>
               <span>{{ $officer->count() }}</span>
            </div>
            <i class="fa-solid fa-guarani-sign" style="font-size:50px"></i>
        </div>
    </div>
</div>
</div>
@endsection
