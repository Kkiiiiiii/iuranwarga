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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body>

        <div class="row" style="height: 100vh;">
            <div class="col-sm-2 bg-utama">
                <nav>
                    <div class="container mt-5">
                        <div class="container-fluid d-flex justify-content-center border rounded-2">
                            <div class="container-fluid card bg-utama m-4 border-0" style="width:18rem;">
                            <img src="{{ asset('assets/foto/profile.jpg') }}" class="rounded-circle" loading="eager">
                            <div class="card-body">
                                <h5 class="card-title text-bold text-center text-white">{{ Auth::user()->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-white text-center">{{ Auth::user()->level }}</h6>
                            </div>
                            </div>
                        </div>
                        <div class="container row-cols-sm-auto mt-4">
                            <a href="{{ route('officer') }}" style="text-decoration: none">
                                <div class="d-flex  gap-2 text-white">
                                    <span>
                                        <i class="fa fa-dashboard" aria-hidden="true"  style="color:  #001E6C"></i>
                                    </span>
                                    <div class="bg-utama">
                                        <p>Dashboard</p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('officer.dues_member') }}" style="text-decoration: none">
                                <div class="d-flex mt-auto gap-2 text-white">
                                    <span>
                                        <i class="fa fa-user-circle" aria-hidden="true"  style="color:  #001E6C"></i>
                                    </span>
                                    <div class="">
                                        <p>Member</p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('officer.payment') }}" style="text-decoration: none">
                                <div class="d-flex mt-auto gap-2 text-white">
                                    <span>
                                        <i class="fa-regular fa-money-bill-1" aria-hidden="true" style="color:  #001E6C"></i>
                                    </span>
                                    <div class="">
                                        <p>Payment</p>
                                    </div>
                                </div>
                            </a>
                              @if (Auth::user())
                            <a href="{{ route('logout') }}" class="text-white" style="text-decoration: none">
                                <i class="fa-solid fa-right-from-bracket" style="color:  #001E6C"></i> Logout</a>
                        @endif
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-sm-10">
                @yield('content')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>

    @stack('scripts')
    </body>
    </html>

