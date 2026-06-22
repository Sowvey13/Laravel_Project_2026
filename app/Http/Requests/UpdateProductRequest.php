<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Ürün adı boş bırakılamaz.',
            'price.required'       => 'Fiyat alanı zorunludur.',
            'price.numeric'        => 'Fiyat sadece rakamlardan oluşmalıdır.',
            'price.min'            => 'Ürün fiyatı negatif olamaz.',
            'description.required' => 'Açıklama alanı boş bırakılamaz.',
        ];
    }
}