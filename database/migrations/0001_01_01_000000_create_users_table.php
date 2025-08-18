<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('points');
            $table->string('role', 5)->default('user');
            $table->boolean('IsVerified')->default(false);
            $table->string('VerificationToken')->nullable();
            $table->dateTime('TokenExpires')->nullable();
            $table->boolean('Status_Delete')->default(false);
            $table->rememberToken();
=======
            $table->id('ID');
            $table->string('Nama');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->enum('Role', ['admin', 'user'])->default('user');
            $table->softDeletes('Status_Delete');
>>>>>>> 0765034083270b2918ff2456abd14a60add00fc5
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
