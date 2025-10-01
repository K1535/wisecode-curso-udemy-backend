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
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name', 250);
            $table->string('ruc', 150);
            $table->string('email', 250)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('imagen', 250)->nullable();
            $table->boolean('state')->unsigned()->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
