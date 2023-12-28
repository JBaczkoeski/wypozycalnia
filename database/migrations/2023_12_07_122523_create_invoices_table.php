<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rental_id');
            $table->decimal('amount', 8, 2);
            $table->dateTime('issue_date');
            $table->timestamps();

            $table->foreign('rental_id')->references('id')->on('rentals');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
