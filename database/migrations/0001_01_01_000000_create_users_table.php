<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->default('User'); // Menambahkan default agar tidak error
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->string('driver_license_number')->unique()->nullable(); // Tambahkan nullable agar opsional
            $table->date('license_expiry_date')->nullable(); // Bisa nullable jika tidak selalu diperlukan
            $table->string('ktp_photo')->nullable();
            $table->string('license_photo')->nullable();
            $table->boolean('verification_status')->default(false);
            $table->rememberToken(); // Untuk fitur "remember me" di Laravel
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
