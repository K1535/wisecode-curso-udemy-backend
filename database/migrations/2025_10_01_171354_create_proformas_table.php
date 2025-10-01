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
        Schema::create('proformas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('asesor comercial');
            $table->unsignedBigInteger('client_id')->comment('cliente');
            $table->unsignedBigInteger('client_segment_id')->comment('segmento de cliente');
            $table->unsignedBigInteger('sucursale_id')->default(4);
            $table->double('subtotal', null, 0)->default(0);
            $table->double('discount', null, 0)->default(0);
            $table->double('total', null, 0);
            $table->double('igv', null, 0);
            $table->boolean('state_proforma')->unsigned()->default(true)->comment('1 cotizacion y 2 es contrato');
            $table->boolean('state_payment')->unsigned()->default(true)->comment('1 es pendiente, 2 es parcial y 3 completo');
            $table->boolean('state_despacho')->unsigned()->default(true)->comment('1 es pendiente y 2 es parcial y 3 completo');
            $table->timestamp('date_entrega')->nullable();
            $table->double('debt', null, 0)->unsigned()->default(0)->comment('deuda');
            $table->double('paid_out', null, 0)->unsigned()->default(0)->comment('pagado o cancelado');
            $table->timestamp('date_validation')->nullable();
            $table->timestamp('date_pay_complete')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proformas');
    }
};
