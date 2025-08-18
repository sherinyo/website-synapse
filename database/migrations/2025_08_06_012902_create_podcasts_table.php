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
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('name', 255)->nullable();
            $table->string('link', 500)->nullable();
            $table->string('status_delete', 1)->default('0');
=======
            $table->string('nama_podcast', 255)->nullable();
            $table->string('link_podcast', 500)->nullable();
            $table->string('status_delete', 1)->default('0'); // 0 = aktif, 1 = delete
>>>>>>> 0765034083270b2918ff2456abd14a60add00fc5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('podcasts');
    }
};
