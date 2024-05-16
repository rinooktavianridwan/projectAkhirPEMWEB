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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();  // id admin, otomatis bertambah
            $table->string('email')->unique();  // email
            $table->string('phone')->nullable();  // phone
            $table->string('address')->nullable();  // address
            $table->string('city')->nullable();  // city
            $table->string('country')->nullable();  // country
            $table->string('postal_code')->nullable();  // postal_code
            $table->timestamps();  // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
