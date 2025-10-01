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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 250)->nullable();
            $table->string('surname', 250)->nullable();
            $table->string('full_name', 250);
            $table->unsignedBigInteger('client_segment_id');
            $table->string('phone', 25)->nullable();
            $table->string('email', 250)->nullable();
            $table->boolean('type')->unsigned()->default(true)->comment('1 es cliente normal y 2 es empresa');
            $table->string('origen', 50)->nullable();
            $table->string('type_document', 150)->nullable();
            $table->string('n_document', 50);
            $table->boolean('sexo')->unsigned()->default(true)->comment('1 es masculino y 2 femenino');
            $table->timestamp('birthdate')->nullable()->comment('fecha de cumple');
            $table->unsignedBigInteger('sucursale_id')->nullable();
            $table->unsignedBigInteger('asesor_id')->nullable();
            $table->boolean('is_parcial')->unsigned()->default(true)->comment('1 es adelanto y 2 no adelanto');
            $table->string('address', 250)->nullable();
            $table->string('ubigeo_distrito', 25)->nullable();
            $table->string('ubigeo_provincia', 25)->nullable();
            $table->string('ubigeo_region', 25)->nullable();
            $table->string('distrito', 80)->nullable();
            $table->string('provincia', 80)->nullable();
            $table->string('region', 80)->nullable();
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
        Schema::dropIfExists('clients');
    }
};
