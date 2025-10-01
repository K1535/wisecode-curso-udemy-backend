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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 250);
            $table->unsignedBigInteger('product_categorie_id');
            $table->string('imagen', 250)->nullable();
            $table->string('sku', 25);
            $table->boolean('state')->unsigned()->default(true)->comment('1 es activo 1 inactivo');
            $table->boolean('state_stock')->unsigned()->default(true)->comment('1 es disponible , 2 es por agotar y 3 agotado');
            $table->double('price_general', null, 0);
            $table->longText('description')->nullable();
            $table->json('specifications')->nullable();
            $table->boolean('is_discount')->unsigned()->default(true)->comment('1 es sin discuento y 2 es descuento');
            $table->double('min_discount', null, 0)->nullable();
            $table->double('max_discount', null, 0)->nullable();
            $table->boolean('is_gift')->unsigned()->default(true)->comment('1 es no grautito y 2 es gratuito');
            $table->boolean('tax_selected')->nullable();
            $table->double('importe_iva', null, 0)->nullable();
            $table->double('umbral', null, 0)->nullable();
            $table->unsignedBigInteger('umbral_unit_id')->nullable();
            $table->boolean('disponiblidad')->unsigned()->nullable()->comment('1 es vender los productos sin stock, 2 no vender los productos sin stock y 3 proyectar con los contratos que se tenga');
            $table->double('tiempo_de_abastecimiento', null, 0)->nullable()->comment('DIAS');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->double('weight', null, 0)->nullable();
            $table->double('width', null, 0)->nullable();
            $table->double('height', null, 0)->nullable();
            $table->double('length', null, 0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
