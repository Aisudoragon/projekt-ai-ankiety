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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login', 20)->unique();
            $table->string('password');
            $table->string('email', 255)->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('permission_id')->default(1);
            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade');
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
