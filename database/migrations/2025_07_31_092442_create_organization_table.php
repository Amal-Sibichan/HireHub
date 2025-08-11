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
        Schema::create('Organization', function (Blueprint $table) {
            $table->bigIncrements('org_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone',100)->nullable();
            $table->text('address')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable(); 
            $table->string('identity')->nullable();
            $table->text('description')->nullable();
            $table->string('password');
            $table->boolean('is_approved')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
        Db::statement('ALTER TABLE Organization AUTO_INCREMENT =5000;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Organizations');
    }
};
