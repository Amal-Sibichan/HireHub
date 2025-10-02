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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->bigIncrements('rev_id');
            $table->text('review');
            $table->tinyInteger('rating');   
            $table->unsignedBigInteger('usr_id');
            $table->foreign('usr_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('og_id');
            $table->foreign('og_id')->references('org_id')->on('Organizations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
