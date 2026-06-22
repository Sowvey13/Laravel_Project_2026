<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true; 
    }

    
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    
    public function messages(): array
    {
        return [
            'name.required'       => 'İsim soyisim alanı zorunludur.',
            'email.required'      => 'Email adresi zorunludur.',
            'email.email'         => 'Lütfen geçerli bir email adresi giriniz.',
            'email.unique'        => 'Bu email adresi zaten kayıtlı.',
            'password.required'   => 'Şifre alanı zorunludur.',
            'password.min'        => 'Şifreniz en az 8 karakter olmalıdır.',
            'password.confirmed'  => 'Şifreler birbiriyle uyuşmuyor.',
        ];
    }
}