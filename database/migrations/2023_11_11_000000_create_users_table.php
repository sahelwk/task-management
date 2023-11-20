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
            $table->foreignId('org_id')->nullable();
            $table->foreignId('dep_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->foreignId('task_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->iteger('photo_id')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status',['active','notactive'])->default('active');
            $table->string('username')->nullable();
            $table->rememberToken();
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
