<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name'); // Nama tabel yang diubah
            $table->bigInteger('entity_id'); // ID dari entitas yang diubah
            $table->string('action_type'); // Jenis perubahan (INSERT, UPDATE, DELETE)
            $table->json('changed_data')->nullable(); // Data yang berubah
            $table->string('admin_user'); // Admin yang melakukan perubahan
            $table->timestamp('action_timestamp')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audit_logs');
    }
};
