<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>CodingTest</title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo"><a href="#">CodingTest</a></div>
            <ul class="menu">
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a class="signup-box" style="color: #ffffff;" href="{{route('register')}}">Registrasi</a></li>
                @else
                <!-- Menu items for Pemilik Mobil -->
                <div class="select-menu">
                    <div class="select-btn">
                        <span class="sBtn-text">{{ Auth::user()->nama }}</span>
                        <i class="bx bx-chevron-down"></i>
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
    <section class="homepage" id="home">
        <div class="content">
            <div class="text">
                <h1>Temukan yang Terbaik</h1>
                <h1>Sewa Mobil Impian</h1>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
            <a href="#services">Our Services</a>
        </div>
    </section>
    <section class="services" id="services">
        <h2>Our Services</h2>
        <p>Explore our wide range of camping gear services.</p>
        <ul class="cards">
            <li class="card">
                <img src="images/tents.jpg" alt="img">
                <h3>Tents</h3>
                <p>Experience comfort and protection with our high-quality camping tents.</p>
            </li>
            <li class="card">
                <img src="images/bags.jpg" alt="img">
                <h3>Sleeping Bags</h3>
                <p>Stay cozy and warm during your camping trips with our premium sleeping bags.</p>
            </li>
            <li class="card">
                <img src="images/stoves.jpg" alt="img">
                <h3>Camp Stoves</h3>
                <p>Cook delicious meals in the great outdoors with our reliable camp stoves.</p>
            </li>
        </ul>
    </section>
    <section class="portfolio" id="portfolio">
        <h2>Jelajahi Mobil Paling Populer</h2>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
        <div class="container-manajemen">
            @forelse ($mobil as $m)
            <div class="box">
                <div class="image">
                    <img src="{{ asset($m->gambar) }}" alt="{{ $m->merek }} - {{ $m->model }}">
                    <div class="card-content">
                        <div class="wrapper">
                            <div class="title">{{ $m->merek }}</div>
                            <a>{{ $m->user->nama }}</a>
                            <a>{{ $m->model }}</a>
                            <a>{{ $m->plat_nomor }}</a>
                            <span class="price"><?= "Rp." . number_format($m->harga) ?></span>
                            <div class="btns">
                                <button style="background-color: #3B71CA;">{{ $m->status }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-message">Belum memiliki mobil yang akan disewakan.</div>
            @endforelse
        </div>
    </section>

    <footer>
        <div>
            <span>Copyright © 2023 All Rights Reserved</span>
            <span class="link">
                <a href="#">Home</a>
                <a href="#contact">Contact</a>
            </span>
        </div>
    </footer>
    <div class="button">
        <a href="#home"><i class="fas fa-arrow-up"></i></a>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>