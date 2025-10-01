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
        Schema::create('caja_egresos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('caja_sucursale_id');
            $table->longText('description');
            $table->double('amount', null, 0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caja_egresos');
    }
};
