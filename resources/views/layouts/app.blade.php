<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Sales Visit - @yield('title')</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-sm  bg-primary">
                <div class="container">
                    <a class="navbar-brand text-white" href="/">Sales Visit</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="collapsibleNavId">
                        @guest
                        @else
                            <ul class="navbar-nav me-auto mt-2 mt-lg-0 ">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                                        <a class="dropdown-item" href="/sales">Sales</a>
                                        <a class="dropdown-item" href="/barang">Barang</a>
                                        <a class="dropdown-item" href="/outlet">Outlet</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transaksi</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                                        <a class="dropdown-item" href="/survey">Survey Stok</a>
                                    </div>
                                </li>
                            </ul>
                        @endguest

                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span style="text-transform:uppercase"> {{ Auth::user()->name }} </span>

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @if ($errors->any())
            <div style="padding: 20px">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (\Session::has('success'))
            <div style="padding: 20px">
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            </div>
        @endif
        @if (\Session::has('failed'))
            <div style="padding: 20px">
                <div class="alert alert-danger">
                    <p>{{ \Session::get('failed') }}</p>
                </div>
            </div>
        @endif
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    <footer>
        @yield('additional-footer')
        <div class="p-5 rounded-3 bg-primary">
            <div class="row ">
                <div class="col-md-4 text-white">
                    <h2 class="">Sales Visit</h2>
                    <p>Jl. Mana Saja dot Com</p>
                    <p>+62 21-832-83</p>
                </div>
                <div class="col-md-4 text-white">
                    <h5>Partner</h5>
                    <ul>
                        <li>Logo</li>
                        <li>Logo</li>
                        <li>Logo</li>
                    </ul>
                </div>
                <div class="col-md-4 text-white">
                    <h5>Useful Links</h5>
                    <ul>
                        <li>Link</li>
                        <li>Link</li>
                        <li>Link</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    </div>
</body>

</html>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
