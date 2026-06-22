<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLE - @yield('title', 'Yönetim Paneli')</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    @stack('styles')
</head>
<body>

    <nav class="navbar">
        <div class="logo">KLE</div>
        @auth
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">Çıkış Yap</button>
            </form>
        @endauth
    </nav>

    <main class="container">
        @yield('content')
    </main>

</body>
</html>