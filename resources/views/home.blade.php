<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Yönetim Paneli</title>
</head>
<body>
    <nav class="navbar">
    <div class="logo">KLE</div>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Çıkış Yap</button>
    </form>
</nav>
    <div class="container">
        <div class="panel-section">
            <h1>Ürün Oluştur</h1>
            <div class="product-form">
                <form action="/products" method="POST">
                    @csrf
                    <input type="text" name="product_name" placeholder="Ürün Adı" required>
                    <input type="number" name="product_price" placeholder="Fiyat" required>
                    <textarea name="description" placeholder="Açıklama" required></textarea>
                    <button type="submit">Ekle</button>
                </form>
            </div>
        </div>

        <hr class="divider">

        <div class="panel-section">
            <h1>Ürün Listesi</h1>
            <div class="product-list">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="product-card">
                            <h4>{{ $product->product_name }}</h4>
                            <p>Fiyat: {{ $product->product_price }} TL</p>
                            <p>{{ Str::limit($product->description, 50, '...') }}</p> 
                            <a href="/products/{{ $product->id }}">Detay / İşlemler</a>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <p>Henüz hiç ürün eklenmemiş.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>