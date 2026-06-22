<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünü Güncelle</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>

<div class="edit-wrapper">
    <div class="edit-container">
        
        <div class="header-action">
            <a href="{{ route('home') }}" class="back-card-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Geri Dön</span>
            </a>
        </div>

        <div class="edit-card">
            <h2>Ürünü Güncelle</h2>
            
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="input-field">
                    <label for="name">Ürün Adı</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                </div>

                <div class="input-field">
                    <label for="price">Ürün Fiyatı (TL)</label>
                    <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
                </div>

                <div class="input-field">
                    <label for="description">Ürün Açıklaması</label>
                    <textarea id="description" name="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="action-buttons">
                    <button type="submit" class="save-btn">Değişiklikleri Kaydet</button>
                </div>
            </form>

            <div class="delete-zone">
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Bu ürünü silmek istediğinize emin misiniz?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Ürünü Sistemden Sil</button>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>