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
        Schema::create('commissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('week', 35)->nullable();
            $table->unsignedBigInteger('product_categorie_id')->nullable();
            $table->unsignedBigInteger('client_segment_id')->nullable();
            $table->string('position', 35)->nullable();
            $table->double('amount', null, 0)->default(0);
            $table->double('percentage', null, 0)->default(0);
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
        Schema::dropIfExists('commissions');
    }
};
