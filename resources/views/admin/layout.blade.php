<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
</head>
<body>
    <header class="navbar navbar-expand-sm bg-utama">
    <div class="container">
        <a class="navbar-brand text-white" href="#"><img src="{{ asset('assets/foto/logoo.png') }}" class="rounded-circle" width="50" height="50"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <form class="d-flex ms-auto w-100 me-2" action="{{ route('admin-searchDuescat') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            @if (Auth::user())
                <a href="{{ route('logout') }}" class="btn btn-danger ms-2">Logout</a>
            @endif
        </div>
    </div>
</header>

    <div class="row" style="height: 100vh;">
        <div class="col-sm-2 bg-utama">
            <nav>
                <div class="container mt-5">
                    <div class="container-fluid d-flex justify-content-center border rounded-2">
                        <div class="container-fluid card bg-utama m-4 border-0" style="width:18rem;">
                          <img src="{{ asset('assets/foto/profile.jpg') }}" class="rounded-circle" loading="eager">
                          <div class="card-body">
                            <h5 class="card-title text-bold text-center">{{ Auth::user()->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-center">{{ Auth::user()->level }}</h6>
                          </div>
                        </div>
                    </div>
                    <div class="container row-cols-sm-auto mt-4">
                        <a href="{{ route('admin') }}" style="text-decoration: none">
                            <div class="d-flex  gap-2 text-black">
                                <span>
                                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                                </span>
                                <div class="bg-utama">
                                    <p>Dashboard</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.wargaTab') }}" style="text-decoration: none">
                            <div class="d-flex mt-auto gap-2 text-black">
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                                <div class="">
                                    <p>Users</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.dues_category') }}" style="text-decoration: none">
                            <div class="d-flex mt-auto gap-2 text-black">
                                <span>
                                    <i class="fa fa-inbox" aria-hidden="true"></i>
                                </span>
                                <div class="">
                                    <p>Category</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.dues_member') }}" style="text-decoration: none">
                            <div class="d-flex mt-auto gap-2 text-black">
                                <span>
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                </span>
                                <div class="">
                                    <p>Member</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.payment') }}" style="text-decoration: none">
                            <div class="d-flex mt-auto gap-2 text-black">
                                <span>
                                    <i class="fa-regular fa-money-bill-1" aria-hidden="true"></i>
                                </span>
                                <div class="">
                                    <p>Payment</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-sm-10">
            @yield('content')
        </div>
    </div>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>
