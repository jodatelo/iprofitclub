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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('valor',10,2);
            $table->unsignedBigInteger('tipotrans');
            $table->integer('tipomov',1)->default(1);
            $table->dateTime('fechaact')->nullable();
            $table->unsignedBigInteger('userupd_id');
            $table->boolean('isDeleted')->default(0);
            $table->boolean('statustrans')->default(1);
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
        Schema::dropIfExists('transaccions');
    }
};
