<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Bảng users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Giữ lại cho Filament
            $table->string('email', 320)->unique();
            $table->string('phone', 10)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 101);
            $table->rememberToken(); // Filament sử dụng
            $table->string('fullname', 255)->nullable();
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('reset_token', 64)->nullable();
            $table->dateTime('reset_token_expires')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('role')->default(1);
            $table->text('avatar')->nullable();
            $table->string('method', 255)->nullable();
            $table->string('google_id')->nullable();
                        $table->timestamps();
        });

        // Bảng password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Bảng sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
