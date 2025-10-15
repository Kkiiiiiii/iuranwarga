<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman - Warga</title>

      <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Optional custom style to fix Select2 in modal -->
    <style>
        .select2-container {
            z-index: 9999 !important;
        }
        .select2-container .select2-selection--single {
            height: 38px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px !important;
        }
        .hover-scale {
    transition: all 0.3s ease-in-out;
    }
    .hover-scale:hover {
        transform: scale(1.03);
    }
    </style>

    @stack('styles')
</head>
<body class="m-0 p-0">
    <div class="row m-0" style="height: 100vh;">
        <div class="col-sm-2 bg-utama">
            <nav>
                <div class="container mt-5">
                    @if (Auth::user())
                    <div class="container-fluid d-flex justify-content-center border rounded-2">
                        <div class="container-fluid card bg-utama m-4 border-0" style="width:18rem;">
                          <img src="{{ asset('assets/foto/profile.jpg') }}" class="rounded-circle">
                          <div class="card-body">
                            <h5 class="card-title text-bold text-center text-white">{{ Auth::user()->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-white text-center">{{ Auth::user()->level }}</h6>
                          </div>
                        </div>
                    </div>
                    @else
                    <div class="container-fluid d-flex justify-content-center border rounded-2">
                        <div class="container-fluid card bg-utama m-4 border-0" style="width:18rem;">
                          <img src="{{ asset('assets/foto/profile.jpg') }}" class="rounded-circle">
                          <div class="card-body ms-0">
                            <a href="{{ route('login') }}" class="btn btn-info card-title text-bold text-center align-items-center">Sign In</a>
                          </div>
                        </div>
                    </div>
                    @endif
                    <div class="container row-cols-sm-auto mt-4">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    </button>
                        <a href="{{ route('admin') }}" style="text-decoration: none">
                            <div class="d-flex  gap-2 text-white">
                                <span>
                                    <i class="fa fa-dashboard" aria-hidden="true" style="color:  #001E6C"></i>
                                </span>
                                <div class="bg-utama">
                                    <p>Dashboard</p>
                                </div>
                            </div>
                        </a>


                        @if (Auth::check())
                        <a href="{{ route('member.history') }}" style="text-decoration: none">
                            <div class="d-flex mt-auto gap-2 text-white">
                                <span>
                                    <i class="fa-solid fa-clock-rotate-left" style="color:  #001E6C"></i>
                                </span>
                                <div class="">
                                    <p>History</p>
                                </div>
                            </div>
                        </a>
                        @endif
                        @if (Auth::user())
                              <a href="{{ route('logout') }}" style="text-decoration: none">
                            <div class="d-flex mt-auto gap-2 text-white">
                                <span>
                                    <i class="fa-solid fa-right-from-bracket" style="color:  #001E6C"></i>
                                </span>
                                <div class="">
                                    <p>Logout</p>
                                </div>
                            </div>
                        </a>               
                            @endif
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-sm-10" style="">
            @yield('content')
        </div>
    </div>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>
