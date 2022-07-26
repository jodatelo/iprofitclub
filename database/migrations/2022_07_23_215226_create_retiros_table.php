<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retiros', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto',10,2);
            $table->string('ncuenta',50)->nullable();
            $table->string('banco',255)->nullable();
            $table->string('tipocuenta',100)->nullable();
            $table->string('cedulatit',10)->nullable();
            $table->string('nombretit',255)->nullable();
            $table->string('moneda',50)->nullable();
            $table->string('red',255)->nullable();
            $table->string('wallet',255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('userapr_id');
            $table->boolean('isDeleted')->default(0);
            $table->boolean('statusret')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retiros');
    }
};
