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
        Schema::create('proforma_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proforma_id');
            $table->unsignedBigInteger('method_payment_id');
            $table->unsignedBigInteger('banco_id')->nullable();
            $table->double('amount', null, 0);
            $table->timestamp('date_validation')->nullable();
            $table->string('n_transaccion', 150)->nullable();
            $table->boolean('verification')->unsigned()->default(true)->comment('1 es no verificado y 2 verificado');
            $table->unsignedBigInteger('user_verification')->nullable();
            $table->string('vaucher', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proforma_payments');
    }
};
