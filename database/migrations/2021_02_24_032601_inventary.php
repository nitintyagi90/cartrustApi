<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inventary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventary', function (Blueprint $table) {
            $table->id();
            $table->integer('brand')->nullable();
            $table->integer('model')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('car_name')->nullable();
            $table->string('year')->nullable();
            $table->string('milage')->nullable();
            $table->string('price')->nullable();
            $table->string('fuel_type')->nullable();
            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->text('front_image')->nullable();
            $table->text('other_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventary');

    }
}
