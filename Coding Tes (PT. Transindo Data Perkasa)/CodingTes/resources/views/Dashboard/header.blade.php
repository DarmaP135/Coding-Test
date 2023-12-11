<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <div class="sidebar">
        <a href="{{ route('dashboard') }}">
            <span>Dashboard</span>
        </a>
        <a href="{{ route('profile') }}">
            <span>Profile</span>
        </a>

        @if(Auth::check() && Auth::user()->role == 'Pemilik Mobil')
        <a href="{{ route('manajemen-mobil') }}">
            <span>Manajemen Mobil</span>
        </a>
        @endif

        <a href="{{ route('peminjaman-mobil') }}">
            <span>Peminjaman Mobil</span>
        </a>
        <a href="{{ route('logout') }}">
            <span>Logout</span>
        </a>
    </div>


    <nav>
        <div class="navbar">
            <div class="logo"><a href="/">CodingTest</a></div>
            <ul class="menu">
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a class="signup-box" style="color: #ffffff;" href="{{route('register')}}">Registrasi</a></li>
                @else
                <!-- Menu items for Pemilik Mobil -->
                <div class="select-menu">
                    <div class="select-btn">
                        <span class="sBtn-text">{{ Auth::user()->nama }}</span>
                    </div>
                    <ul class="options">
                        <li class="option">
                            <a href="{{ route('dashboard') }}" class="option-btn">Dashboard</a>
                        </li>
                        <li class="option">
                            <a href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>

                @endguest
            </ul>
        </div>
    </nav>
    <div class="content-wrapper">
        @yield('main')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>