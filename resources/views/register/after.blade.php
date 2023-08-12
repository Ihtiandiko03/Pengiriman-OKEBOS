{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OKEBOS</title>
</head>
<body>
    <ul>
        
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome Back, {{ auth()->user()->username }}
                </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </li>
            </ul>
            </li>
            @else
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            @endauth
    @auth
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <ul class="list-group mt-3">
                        <li class="list-group-item">Username: {{ Auth::user()->username }}</li>
                        <li class="list-group-item">Email: {{ Auth::user()->email }}</li>
                        <li class="list-group-item">Referral link: {{ Auth::user()->referral_link }}</li>
                        <li class="list-group-item">Referrer: {{ Auth::user()->referrer->name ?? 'Not Specified' }}</li>
                        <li class="list-group-item">Refferal count: {{ count(Auth::user()->referrals)  ?? '0' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    </ul>
    @endauth
</body>
</html> --}}

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{!! asset('css/landing_page.css') !!}">

        <title>OkeBos</title>
    </head>
    <body>
        <!--===== HEADER =====-->
        <header class="l-header">
            <nav class="nav bd-grid">
                <div>
                    <img class="nav__logo" src="{!! asset('img/OkeBos.png') !!}">
                </div>
                
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>

                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
                        <li class="nav__item"><a href="#pengiriman" class="nav__link">Pengiriman</a></li>
                        <li class="nav__item"><a href="#Order" class="nav__link">Order</a></li>
                        <li class="nav__item"><button class="login__button">Login</li>
                    </ul>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--===== HOME =====-->
            <section class="home" id="home">
                <div class="home__container bd-grid">
                    <div class="home__img">
                        <img src="{!! asset('img/Vector.png') !!}" alt="" data-speed="2" class="move">
                        <img src="{!! asset('img/kurir_1.png') !!}" alt="" data-speed="-2" class="move">
                    </div>

                    <div class="home__data">
                        {{-- <h1 class="home__title">Melayani Anda</h1>
                        <h1 class="home__title2">Seperti Bos</h1>
                        <p class="home__description">Mari Gunakan OkeBos <br> Untuk Pengiriman.</p>
                         --}}
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome Back, {{ auth()->user()->username }}
                            </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                        </li>
                        @else
                        <a href="/login" class="home__button">Mulai Pengiriman</a>
                        {{-- <li><a href="/register" class="home__button">Register</a></li> --}}
                        @endauth
                        
                        @auth
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">

                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            You are logged in!
                                                
                                            <ul class="list-group mt-3">
                                                <li>Username: {{ auth()->user()->username }}</li>
                                                <li>Email: {{ auth()->user()->email }}</li>
                                                <li>Referral link: <a href="{{ auth()->user()->referral_link }}">{{ auth()->user()->referral_link }}</a></li>
                                                <li>Referrer: {{ auth()->user()->referrer->name ?? 'Not Specified' }}</li>
                                                <li>Refferal count: {{ count(auth()->user()->referrals)  ?? '0' }}</li>
                                                <a href="">{{ auth()->user()->referrals }}</a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endauth 
                        {{-- <a href="#" class="home__button">Mulai Pengiriman</a> --}}
                    </div>
                </div>
            </section>
        </main>

        <!--===== GSAP =====-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>

        <!--===== MAIN JS =====-->
        <script src="{!! asset('js/landing_page.js') !!}"></script>
    </body>
</html>