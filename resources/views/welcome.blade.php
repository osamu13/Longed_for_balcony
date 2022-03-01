<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Longed-for balcony</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/common.css') }}" rel="stylesheet">

    </head>
    <body>
        <header class="d-md-flex bg-white align-items-center justify-content-md-between">
            <div>
                <h1 class="header_title text-center m-0 pl-md-5">Longed-for balcony</h1>
            </div>
            <div class="text-center pr-md-5">
                @if (Route::has('login'))
                    <div class="px-6 py-4 pr-3">
                        @auth
                            <a href="{{ url('/posts') }}" class="text-dark underline">ホーム</a>
                        @else
                            <a href="{{ route('login') }}" class="text-dark">ログイン</a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-dark">登録</a>
                        @endif
                        <a href="{{ route('login.guest') }}" class="ml-4 text-dark">ゲストでログイン</a>
                        @endauth
                    </div>
                @endif
            </div>
        </header>

        <main>
            <div>
                <ul class="box">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>

            <div class="catch_copy">
                <h2 class="ml-1 text-white">素敵なバルコニーを作って、<br>家をもっと素敵なものにしよう!</h2>
            </div>
        </main>

        <footer>
            <p class="m-0 text-center bg-white">© 2022 osamurakouhei</p>
        </footer>

    </body>
</html>
