<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Giriş Yap</title>
</head>
<body>
    <div class="login-card">
        @if(session('success'))
    <div style="color: green; margin-bottom: 1rem; text-align: center;">
        {{ session('success') }}
    </div>
@endif
        <h2>Giriş Yap</h2>
        
        @if($errors->any())
            <div style="color: #d32f2f; margin-bottom: 1rem; text-align: center;">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="login-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="login-group">
                <label>Şifre</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Giriş Yap</button>
            <p>Bir hesabınız yok mu?</p>
            <a class="register__link" href="/register">Hesap oluştur</a>
        </form>
    </div>
</body>
</html>