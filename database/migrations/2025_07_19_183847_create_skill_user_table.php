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
        Schema::create('skill_user', function (Blueprint $table) {
            $table->bigIncrements('su_id');
            $table->foreignId('u_id')->constrained('user', 'user_id')->onDelete('cascade');
            $table->foreignId('s_id')->constrained('skills', 's_id')->onDelete('cascade');
            $table->string('level', 20)->nullable(); // Optional: to store the level of the skill
            $table->string('years_of_experience', 10)->nullable(); // Optional: to store years of experience with the skill
            $table->string('certification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_user');
    }
};
