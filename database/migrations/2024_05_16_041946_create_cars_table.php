<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();  // id mobil, otomatis
            $table->string('name');  // Nama mobil
            $table->string('category');  // Kategori
            $table->string('image');  // gambar
            $table->string('city');  // kota
            $table->string('status')->default('Tersedia');  // status dengan nilai default 'Tersedia'
            $table->decimal('price', 10, 2);  // Harga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

