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
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('date_emision')->nullable();
            $table->boolean('state')->unsigned()->default(true)->comment('1-SOLICITUD,2-REVISION,3-PARCIAL,4-ENTREGA');
            $table->string('type_comprobant', 150);
            $table->string('n_comprobant', 150);
            $table->unsignedBigInteger('provider_id');
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
        Schema::dropIfExists('purchases');
    }
};
