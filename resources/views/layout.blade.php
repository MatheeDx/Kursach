<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <div class="cont">
            <a href="/"><h1>Блог великих людей</h1></a>
            <div class="a">
                @auth
                    <a href="stars">Избранное</a>
                    <a href="newPost">Создать пост</a>
                @endauth

            </div>
            <div class="a">
                @guest
                    <a href="login">Войти</a>
                    <a href="reg">Регистрация</a>
                @endguest
                @auth
                    <a href="http://127.0.0.1:8000/my"><h1 style="color:rgb(238, 75, 0); font-size:1.5em;"><?php echo Auth::user()->login; ?></h1></a>
                    <a href="logout">Выйти</a>
                @endauth
            </div>
        </div>
    </header>

    <section class="main">
        <div class="cont">
            @yield('main_content')
        </div>
    </section>


</body>
@vite(['resources/js/jquery-3.7.1.min.js'])
@vite(['resources/js/app.js'])
</html>
