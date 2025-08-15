<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('HistoryPoint', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('synapoint_requests'); // foreign key ke tabel RequestPoint
            $table->foreignId('user_id')->constrained('users'); // foreign key ke tabel users
            $table->string('nama_kegiatan');
            $table->integer('point');
            $table->string('status_point', 1)->default('1');
            $table->string('status_delete', 1)->default('0');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('HistoryPoint');
    }
};
