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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 250)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('role', 1)->nullable(); // 0 = event, 1 = news
            $table->dateTime('mulai')->nullable();
            $table->dateTime('selesai')->nullable();
            $table->string('lokasi', 150)->nullable();
            $table->text('gambar')->nullable();
            $table->string('status_delete', 1)->default('0'); // 0 = aktif, 1 = delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
