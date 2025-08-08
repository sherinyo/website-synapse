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
        Schema::create('synapoint_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('synapoint_id')->constrained('synapoints')->onDelete('cascade');
            $table->date('tanggal')->nullable();
            $table->string('nama_kegiatan', 255)->nullable();
            $table->integer('poin');
            $table->enum('status_point', ['pending', 'approved', 'rejected'])->default('pending'); // ubah dari status
            $table->string('status_delete', 1)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('synapoint_histories');
    }
};
