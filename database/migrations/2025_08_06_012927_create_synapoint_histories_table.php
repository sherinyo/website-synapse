<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< HEAD
    public function up(): void
    {
        Schema::create('HistoryPoint', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('synapoint_requests'); // foreign key ke tabel RequestPoint
            $table->foreignId('user_id')->constrained('users'); // foreign key ke tabel users
            $table->string('nama_kegiatan');
            $table->integer('point');
            $table->string('status_point', 1)->default('1');
=======
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
>>>>>>> 0765034083270b2918ff2456abd14a60add00fc5
            $table->string('status_delete', 1)->default('0');
            $table->timestamps();
        });
    }

<<<<<<< HEAD
    public function down(): void
    {
        Schema::dropIfExists('HistoryPoint');
=======
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('synapoint_histories');
>>>>>>> 0765034083270b2918ff2456abd14a60add00fc5
    }
};
