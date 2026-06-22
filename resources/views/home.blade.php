@extends('layouts.app')

@section('title', 'Ana Sayfa')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="panel-section">
            <h1>Ürün Oluştur</h1>
            <div class="product-form">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ürün Adı" value="{{ old('name') }}" required>
                        @error('name') 
                            <small class="error-text">{{ $message }}</small> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="number" name="price" placeholder="Fiyat" min="0" step="0.01" value="{{ old('price') }}" required>
                        @error('price') 
                            <small class="error-text">{{ $message }}</small> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea name="description" placeholder="Açıklama" required>{{ old('description') }}</textarea>
                        @error('description') 
                            <small class="error-text">{{ $message }}</small> 
                        @enderror
                    </div>

                    <button type="submit">Ekle</button>
                </form>
            </div>
        </div>

        <hr class="divider">

        <div class="panel-section">
            <h1>Ürün Listesi</h1>
            <div class="product-list">
                @forelse($products as $product)
                    <div class="product-card">
                        <h4>{{ $product->name }}</h4>
                        <p>Fiyat: {{ number_format($product->price, 2, ',', '.') }} TL</p>
                        <p>{{ Str::limit($product->description, 50, '...') }}</p> 
                        
                        <a href="{{ route('products.show', $product) }}">Ürünü Gör</a>
                    </div>
                @empty
                    <div class="empty-state">
                        <p>Henüz hiç ürün eklenmemiş.</p>
                    </div>
                @endforelse 
            </div>
        </div>
    </div>
@endsection