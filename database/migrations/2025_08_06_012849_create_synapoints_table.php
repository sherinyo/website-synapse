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
        Schema::create('synapoints', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan', 255);
            $table->integer('min_poin')->nullable()->default(0);
            $table->integer('max_poin')->nullable()->default(0);
            $table->integer('bonus_poin')->nullable()->default(0);
            $table->string('status_delete', 1)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('synapoints');
    }
};
