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
        Schema::create('proforma_deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proforma_id');
            $table->unsignedBigInteger('sucursale_deliverie_id');
            $table->timestamp('date_entrega')->nullable();
            $table->timestamp('date_envio')->nullable();
            $table->string('address', 250)->nullable();
            $table->string('ubigeo_provincia', 100)->nullable();
            $table->string('ubigeo_region', 100)->nullable();
            $table->string('ubigeo_distrito', 100)->nullable();
            $table->string('distrito', 100)->nullable();
            $table->string('provincia', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('agencia', 250)->nullable();
            $table->string('full_name_encargado', 250)->nullable();
            $table->string('documento_encargado', 250)->nullable();
            $table->string('telefono_encargado', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proforma_deliveries');
    }
};
