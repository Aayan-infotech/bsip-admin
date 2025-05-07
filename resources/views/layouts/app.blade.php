<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- jQuery CDN (Load Before Any Script) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Add this in the <head> section of layouts.app -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    {{-- editor --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <!-- Toastr CSS & JS -->
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle/css/bootstrap4-toggle.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>




    <style>
        body {
            background-color: white;
        }

        .spinner-border {
            width: 1.2rem;
            height: 1.2rem;
            margin-left: 8px;
            display: none;
        }

        .yajraTable {
            font-size: 14px;
            border-collapse: collapse;
        }

        .yajraTable th {
            background-color: #343a40;
            color: white;
            text-align: center;
        }

        .yajraTable td {
            text-align: center;
            vertical-align: middle;
        }

        .yajraTable .btn {
            font-size: 12px;
            padding: 5px 10px;
        }

        .yajraTable .toggle-status {
            transform: scale(1.2);
        }

        .table-responsive {
            margin-top: 20px;
        }

        .sidebar {
            border-right: 1px solid #ddd;
        }

        .nav-link {
            color: #007bff;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #0056b3;
        }

        .nav-link.active {
            font-weight: bold;
            color: #0056b3;
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>


    <style>
        .startup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #101820;
            /* dark like Windows boot */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: fadeOut 1s ease-in-out 3s forwards;
        }

        .startup-logo {
            animation: zoomInOut 2.5s ease-in-out infinite;
        }

        @keyframes zoomInOut {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.8;
            }

            50% {
                transform: scale(1.15);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                visibility: hidden;
                z-index: -1;
            }
        }
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/adminDashboard') }}">
                    <img src="bsipLogo.png" alt="logo" width="25" height="25"
                        class="d-inline-block align-text-top">
                    <span>{{ config('app.name', 'Laravel') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="startup-loader" class="startup-overlay">
            <div class="startup-logo">
                <svg width="80" height="80" viewBox="0 0 48 48" fill="#ffffff"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="3" width="18" height="18" fill="#ffffff" />
                    <rect x="27" y="3" width="18" height="18" fill="#ffffff" />
                    <rect x="3" y="27" width="18" height="18" fill="#ffffff" />
                    <rect x="27" y="27" width="18" height="18" fill="#ffffff" />
                </svg>
                <!-- <img src="{{ asset('/bsipLogo.png') }}" alt=""> -->
            </div>
        </div>

        <main class="">
            @yield('content')
        </main>
    </div>

    <script>
        setTimeout(() => {
            const loader = document.getElementById('startup-loader');
            if (loader) loader.remove();
        }, 4000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

</body>

</html>
