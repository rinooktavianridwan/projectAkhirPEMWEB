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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();  // id transaksi, otomatis bertambah
            $table->unsignedBigInteger('user_id');  // id user, foreign key
            $table->unsignedBigInteger('car_id');  // id car, foreign key
            $table->date('pickup_date');  // tgl ambil
            $table->date('return_date');  // tgl return
            $table->decimal('transaction_value', 10, 2);  // nilai transaksi
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
