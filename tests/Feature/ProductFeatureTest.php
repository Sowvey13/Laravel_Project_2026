<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_misafir_kullanici_home_sayfasina_giremez_ve_auth_required_sayfasina_yonlendirilir()
    {
        $response = $this->get('/home');
        
        
        $response->assertRedirect(route('auth-required'));
    }

    public function test_giris_yapmis_kullanici_urun_olusturabilir()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('products.store'), [
            'name' => 'Test Urunu',
            'price' => 99.99,
            'description' => 'Harika bir test aciklamasi'
        ]);

        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('products', ['name' => 'Test Urunu']);
    }

    
    public function test_bir_kullanici_baskasinin_urununu_silemez()
    {
        $sahip = User::factory()->create();
        $yabanci = User::factory()->create();

        $urun = Product::factory()->create(['user_id' => $sahip->id]);

        $response = $this->actingAs($yabanci)->delete(route('products.destroy', $urun));

        $response->assertStatus(403); 
        $this->assertDatabaseHas('products', ['id' => $urun->id]); 
    }
}   