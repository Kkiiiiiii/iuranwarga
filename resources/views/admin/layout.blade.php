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
            <a class="navbar-brand" href="#">Navbar</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <form class="d-flex my-2 my-lg-0">
                    <input
                        class="form-control me-sm-2"
                        type="text"
                        placeholder="Search"
                    />
                    <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
                        Search
                    </button>
                </form>
            </div>
        </div>
    </header>
    <div class="row" style="height: 100vh;">
        <div class="col-sm-2 bg-utama">
            <nav>
                <div class="container">
                    <div class="container-fluid d-flex bg-danger justify-content-center" style="height: 200px">
                        <div class="container">
                            <div class="container-fluid mt-4">
                                <img src="{{ asset('assets/foto/profile.jpg') }}" alt="" style="width: 100%" class="rounded-circle">
                            </div>
                            <div class="bg-white bg-light mt-3 text-center">Idoy</div>
                        </div>
                    </div>
                    <div class="">p</div>
                </div>
            </nav>
        </div>
        <div class="col-sm-10 bg-primary">
            @yield('content')
        </div>
    </div>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>