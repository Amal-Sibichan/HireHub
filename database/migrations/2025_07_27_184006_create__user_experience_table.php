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
        Schema::create('Experience', function (Blueprint $table) {
            $table->bigIncrements('ex_id');
            $table->bigInteger('xus_id')->unsigned();
            $table->foreign('xus_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('position',50)->nullable();
            $table->string('company',100)->nullable();
            $table->string('discp', 500)->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->timestamps();
        });
        Db::statement('ALTER TABLE Experience AUTO_INCREMENT =4000;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Experience');
    }
};
