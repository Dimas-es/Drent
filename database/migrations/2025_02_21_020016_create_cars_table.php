<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->year('year');
            $table->string('transmission_type');
            $table->integer('passenger_capacity');
            $table->decimal('daily_price', 10, 2);
            $table->string('pickup_location');
            $table->enum('availability_status', ['available', 'unavailable'])->default('available');
            $table->string('photo_url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
