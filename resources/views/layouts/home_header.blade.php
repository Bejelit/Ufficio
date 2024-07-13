<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
@yield('header', 'no header')
<header>
    <a class="back" href="javascript:void(0);" onclick="window.history.back();"><- <a/>
    @auth
        <div class="header-container">

            <form id="logout-form" method="POST" action="/logout">
                @csrf
                <a class="header-greeting">Ciao, {{ Auth::user()->name }}</a>
                <button class="BottoneHead" type="submit">Esci</button>
            </form>
        </div>
    @else
        <div class="header-container">
            <a class="authy" href="{{ route('register') }}">Registrati</a>
            <a class="authy" href="{{ route('login') }}">Accedi</a>
        </div>
    @endauth
</header>
</body>
</html>
