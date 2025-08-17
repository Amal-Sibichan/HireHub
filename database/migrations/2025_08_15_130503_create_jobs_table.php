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
        Schema::create('Job', function (Blueprint $table) {
            $table->bigIncrements('j_id');
            $table->bigInteger('org_id');
            $table->string('name');
            $table->text('description');
            $table->text('skills');
            $table->text('Experience')->nullable();
            $table->text('Education')->nullable();
            $table->string('address',50)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('salary');
            $table->date('due');
            $table->timestamps();
        });
        Db::statement('ALTER TABLE Job AUTO_INCREMENT =2000;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Job');
    }
};
