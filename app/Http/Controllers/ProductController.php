<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        $hasProducts = $products->count() > 0;
        return view('home', compact('products', 'hasProducts'));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'description' => 'required|string',
        ]);

       
        Product::create([
            'product_name' => $validated['product_name'],
            'product_price' => $validated['product_price'],
            'description' => $validated['description'],
            'user_id' => auth()->id(), 
        ]);

        return redirect('/home')->with('success', 'Ürün başarıyla listeye eklendi!');
    }
    public function show(Product $product) 
{
    return view('show', compact('product'));
}

public function update(Request $request, Product $product) 
{
   
    $messages = [
        'product_name.required' => 'Ürün adı boş bırakılamaz.',
        'product_price.required' => 'Fiyat alanı zorunludur.',
        'product_price.numeric' => 'Fiyat sadece rakamlardan oluşmalıdır.',
        'description.required' => 'Açıklama alanı boş bırakılamaz.',
    ];

    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'product_price' => 'required|numeric',
        'description' => 'required|string',
    ], $messages); 

    $product->update($validated);
    
    return redirect('/home')->with('success', 'Ürün başarıyla güncellendi!');
}

public function destroy(Product $product) 
{
    $product->delete();
    return redirect('/home')->with('success', 'Ürün silindi!');
}
public function indexAll()
{
    $products = \App\Models\Product::all();
    return view('products', compact('products'));
}
}