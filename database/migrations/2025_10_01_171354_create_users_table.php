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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname', 250)->nullable();
            $table->string('email')->unique();
            $table->string('phone', 25)->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->unsignedBigInteger('sucursale_id')->default(4);
            $table->string('type_document', 35)->nullable();
            $table->string('n_document', 25)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('gender', 15)->nullable();
            $table->string('avatar', 250)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
