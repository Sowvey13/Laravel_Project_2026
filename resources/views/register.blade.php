<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Kayıt Ol</title>
</head>
<body>
    <div class="register-card">
        @if ($errors->any())
    <div style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h2>Hoş Geldiniz</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="reg-group">
                <label>İsim Soyisim</label>
                <input type="text" name="name" required>
            </div>
            <div class="reg-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="reg-group">
                <label>Şifre</label>
                <input type="password" name="password" required>
            </div>
            <div class="reg-group">
                <label>Şifre Tekrarı</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn-register">Kayıt Ol</button>
            <p>Zaten bir hesabınız var mı?</p>
            <a class="login__link" href="/login">Giriş yap</a>
        </form>
    </div>
</body>
</html>