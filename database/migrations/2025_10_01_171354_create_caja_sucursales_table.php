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
        Schema::create('caja_sucursales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('usuario de apertura');
            $table->unsignedBigInteger('caja_id')->comment('caja');
            $table->boolean('state')->unsigned()->default(true)->comment('1 es apertura y 2 cierre');
            $table->unsignedBigInteger('user_close')->nullable();
            $table->timestamp('date_close')->nullable();
            $table->double('efectivo_initial', null, 0)->default(0);
            $table->double('ingresos', null, 0)->default(0);
            $table->double('egresos', null, 0)->default(0);
            $table->double('efectivo_process', null, 0)->default(0);
            $table->double('efectivo_finish', null, 0)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caja_sucursales');
    }
};
