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
        Schema::create('transports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('warehouse_start_id');
            $table->unsignedBigInteger('warehouse_end_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('date_emision')->nullable();
            $table->boolean('state')->unsigned()->default(true)->comment('1-SOLICITUD,2-REVISION SALIDA,3-SALIDA,4-LLEGADA,5.-REVISION LLEGADA, 6.- ENTREGA');
            $table->text('description')->nullable();
            $table->double('total', null, 0)->default(0);
            $table->double('importe', null, 0)->default(0);
            $table->double('igv', null, 0)->default(0);
            $table->timestamp('date_entrega')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transports');
    }
};
