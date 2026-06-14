<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth-required.css') }}">
    <title>Giriş Gerekli</title>
</head>
<body>
    <div class="container">
        <h1>Giriş Gerekli</h1>
        <p>Verileri görmek için giriş yapmalısınız.</p>
        <a href="{{ route('login') }}" class="btn">Giriş Yap</a>
    </div>
</body>
</html>