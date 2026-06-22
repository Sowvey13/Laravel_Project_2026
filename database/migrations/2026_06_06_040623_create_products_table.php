<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // Sadece bu tek satır kalacak, böylece duplicate hatası bitti
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('name'); 
            $table->decimal('price', 12, 2);
            $table->text('description');
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};