<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
</head>
<body>
     @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 <div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow-sm">
         <div class="card-header text-center bg-info">
                <h4 class="text-white mb-0">Register Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Name:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-file-signature"></i></span>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Masukan nama anda">
                        </div>
                    </div>
                      <div class="mb-3">
                        <label for="name" class="form-label">Username:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username anda">
                        </div>
                    </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input type="password" name="password" class="form-control" id="username" placeholder="Masukan Password anda">
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="nohp" class="form-label">Nohp:</label>
                      <div class="input-group">
                          <span class="input-group-text"><i class="fa-solid fa-square-phone"></i></span>
                          <input type="number" name="nohp" class="form-control" id="nohp" placeholder="Masukan nohp anda">
                      </div>
                  </div>
                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <div class="input-group">
                            <textarea name="address" id="address" style="width: 100vh"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-md w-100 btn-success">Register</button>
                    </div>
                </form>
            </div>
    </div>
 </div>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>


