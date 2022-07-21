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
        Schema::create('polizas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('valor',10,2);
            $table->decimal('valorinteres',10,2);
            $table->dateTime('fechainversion');
            $table->dateTime('fechacapital')->nullable();
            $table->dateTime('fechainteres')->nullable();
            $table->boolean('isDeleted')->default(0);
            $table->boolean('statuspoliza')->default(1);
            $table->boolean('statusi')->default(0);
            $table->boolean('statusg')->default(0);
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
        Schema::dropIfExists('polizas');
    }
};
