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
            $table->enum('type', ['SUV', 'sedan', 'sportowy', 'dostawczy']);
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
