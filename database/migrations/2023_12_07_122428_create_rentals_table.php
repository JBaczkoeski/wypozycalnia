<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('car_id');
            $table->dateTime('rental_date');
            $table->dateTime('return_date');
            $table->integer('total_cost');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
