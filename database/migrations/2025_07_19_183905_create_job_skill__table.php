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
        Schema::create('job_skill_', function (Blueprint $table) {
            $table->bigIncrements('js_id');
            $table->foreignId('j_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->foreignId('s_id')->constrained('skills', 's_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_skill_');
    }
};
