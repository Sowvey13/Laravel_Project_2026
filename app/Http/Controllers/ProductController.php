<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        
        $products = Auth::user()->products;
        return view('home', compact('products'));
    }

    public function store(StoreProductRequest $request)
    {
       
        Auth::user()->products()->create($request->validated());
        return redirect()->route('home')->with('success', 'Ürün başarıyla eklendi.');
    }

    public function show(Product $product)
    {
       
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Bu ürünü görüntüleme yetkiniz yok.');
        }

        return view('show', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
       
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Bu ürünü güncelleme yetkiniz yok.');
        }

        $product->update($request->validated());
        return redirect()->route('home')->with('success', 'Ürün başarıyla güncellendi.');
    }

    public function destroy(Product $product)
    {
        
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Bu ürünü silme yetkiniz yok.');
        }

        $product->delete();
        return redirect()->route('home')->with('success', 'Ürün başarıyla silindi.');
    }
}