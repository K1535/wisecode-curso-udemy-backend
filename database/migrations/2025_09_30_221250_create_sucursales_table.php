<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('address', 250)->nullable();
            $table->tinyInteger('state')->unsigned()->default(1);
            
            $table->timestamp('created_at')->nullable();  // como lo tenías
            $table->timestamp('updated_at')->nullable();   // como lo tenías
            $table->timestamp('deleted_at')->nullable();  // como lo tenías

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sucursales');
    }
};
