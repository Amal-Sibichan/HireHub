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
        Schema::create('Academics', function (Blueprint $table) {
            $table->bigIncrements('edu_id');
            $table->bigInteger('us_id')->unsigned();
            $table->foreign('us_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('Level', 50)->nullable();
            $table->string('Institute', 100)->nullable();
            $table->string('Course', 100)->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->timestamps();
        });
        Db::statement('ALTER TABLE Academics AUTO_INCREMENT =3000;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Academics', function (Blueprint $table) {
            Schema::dropIfExists('Academics');
        });
    }
};
