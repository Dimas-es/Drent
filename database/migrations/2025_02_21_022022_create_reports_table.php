<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->enum('report_type', ['daily', 'weekly', 'monthly', 'yearly']);
            $table->string('date_range'); // Contoh: "01-07-2024 to 07-07-2024"
            $table->decimal('total_revenue', 15, 2)->default(0);
            $table->integer('total_bookings')->default(0);
            $table->integer('vehicle_usage')->default(0); // Berapa banyak mobil yang digunakan dalam periode tersebut
            $table->timestamp('generated_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
