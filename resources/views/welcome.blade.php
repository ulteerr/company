<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <title>@yield('title')</title>
    <link rel="icon" href="">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')
</head>
<body>
<div class="container content_site col-6 col-sm-12 col-md-12">
    <header class="mt-2">
        <div class="flex-column flex-md-row align-items-center pb-3 mb-4 main_menu">
            <a href="{{ route('index') }}" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">iCompany</span></a>
            <nav class="d-md-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('index') }}">Главная</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('company') }}">Все Компании</a>

                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-light me-2" href="{{ route('login') }}">Войти</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-warning" href="{{ route('register') }}">Регистрация</a>
                    @endif
                @else
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}">
                            Личный кабинет
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Выйти
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </nav>
        </div>
        <div class="mobile_menu">
            <div class="top_mobile_menu d-flex justify-content-between">
                <a href="{{ route('index') }}" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">iCompany</span></a>
                <div class="burger"></div>
            </div>
            <div class="menu">
                <div class="content_menu">
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('index') }}">Главная</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('company') }}">Все Компании</a>
                    @guest
                        @if (Route::has('login'))
                            <a class="btn btn-light me-2" href="{{ route('login') }}">Войти</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="btn btn-warning" href="{{ route('register') }}">Регистрация</a>
                        @endif
                    @else

                        <a class="btn btn-warning mb-2" href="{{ route('home') }}">Личный кабинет</a>
                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </header>
    @yield('main_content')
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center all_rights">
            Все права защищены &copy;
        </div>
        <div class="social">
            <a class="social__link wp" href="#"><i class="fab fa-whatsapp"></i></a>
            <a class="social__link in" href="#"><i class="fab fa-instagram"></i></a>
            <a class="social__link vk" href="#"><i class="fab fa-vk"></i></a>
            <a class="social__link tl" href="#"><i class="fab fa-telegram"></i></a>
        </div>
    </footer>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
