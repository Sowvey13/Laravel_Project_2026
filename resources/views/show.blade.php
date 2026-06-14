<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <title>Düzenle</title>
</head>
<body>
    <div class="container">
        <a href="/home" class="back-link">← Geri dön</a>
        
        <div class="product-grid">
            <div class="product-card">
                <h1>{{ $product->product_name }}</h1>
                <div class="price-tag">{{ $product->product_price }} TL</div>
                <p>{{ $product->description }}</p>
            </div>

            <div class="product-form">
                <h3>Düzenleme Paneli</h3>
                <form action="/products/{{ $product->id }}" method="POST">
    @csrf @method('PUT')
    
    <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}" required>
    @error('product_name') <small style="color:red">{{ $message }}</small> @enderror

    <input type="number" name="product_price" value="{{ old('product_price', $product->product_price) }}" required>
    @error('product_price') <small style="color:red">{{ $message }}</small> @enderror

    <textarea name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
    @error('description') <small style="color:red">{{ $message }}</small> @enderror
    
    <button type="submit" class="btn-update">Güncelle</button>
</form>

                <form action="/products/{{ $product->id }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-delete">Sil</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>