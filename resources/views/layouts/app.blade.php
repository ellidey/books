<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="head">
    <div class="head__inner">
        <a href="/" class="head__logo">
            <img src="{{ asset('img/logo.png') }}" alt="">
            Каталог книг
        </a>

        <div class="head__search">
            <input class="head_search-input" type="text">
            <button class="btn search-btn">
                Поиск
            </button>
        </div>

        <div class="head__menu">
            @if(auth()->user())
                <a href="{{ route('home') }}" class="head__menu-item">Профиль</a>
                <a href="{{ route('books.index') }}" class="head__menu-item">Книги</a>
                <a href="{{ route('users.index') }}" class="head__menu-item">Пользователи</a>
            @else
                <a href="{{ route('login') }}" class="head__menu-item">Авторизация</a>
                <a href="{{ route('register') }}" class="head__menu-item">Регистрация</a>
            @endif
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</header>
    <div class="container">
        @yield('content')
    </div>

    <script>
        function myFunction() {
            const menu = document.querySelector('.head__inner');
            if (menu.classList.contains('open')) {
                menu.classList.remove('open');
            } else {
                menu.classList.add('open');
            }
        }
    </script>
</body>
</html>
