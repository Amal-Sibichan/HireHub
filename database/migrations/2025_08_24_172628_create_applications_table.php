<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Applications', function (Blueprint $table) {
            $table->bigIncrements('app_id');
            $table->bigInteger('u_id')->unsigned();
            $table->foreign('u_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')->references('j_id')->on('jobs')->onDelete('cascade');
            $table->bigInteger('or_id')->unsigned();
            $table->foreign('or_id')->references('org_id')->on('Organizations')->onDelete('cascade');
            $table->timestamps();
        });
        Db::statement('ALTER TABLE Applications AUTO_INCREMENT =6000;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Applications');
    }
};
