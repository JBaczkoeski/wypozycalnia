<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->string('model');
            $table->date('year');
            $table->string('registration_number');
            $table->integer('price_per_day');
            $table->integer('power');
            $table->string('img');
            $table->enum('type', ['SUV', 'sedan', 'sportowy', 'dostawczy']);
            $table->enum('fuel', ['diesel', 'benzyna']);
            $table->enum('transmission', ['manualna', 'automatyczna']);
            $table->boolean('availability')->default(true);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
