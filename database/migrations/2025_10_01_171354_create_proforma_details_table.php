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
        Schema::create('proforma_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proforma_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_categorie_id');
            $table->unsignedBigInteger('unit_id');
            $table->longText('description')->nullable();
            $table->double('quantity', null, 0)->unsigned();
            $table->double('price_unit', null, 0)->unsigned();
            $table->double('discount', null, 0)->default(0);
            $table->double('impuesto', null, 0)->default(0);
            $table->double('subtotal', null, 0);
            $table->double('total', null, 0);
            $table->timestamp('date_entrega')->nullable();
            $table->unsignedBigInteger('user_entrega')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proforma_details');
    }
};
