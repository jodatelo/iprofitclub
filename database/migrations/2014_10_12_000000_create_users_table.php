<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('dni')->unique();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->string('ref')->nullable();
            $table->string('cedulafro')->nullable();
            $table->string('cedularev')->nullable();
            $table->string('isAdmin')->default(0);
            $table->rememberToken();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        User::create(['name' => 'admin','email' => 'info@iprofit.club','status'=>1,'isAdmin'=>1,'dni' => '0999','password' => Hash::make('123456'),'email_verified_at'=>'2022-01-02 17:04:59','avatar' => 'avatar-1.jpg','ref' => 'info@iprofit.club','created_at' => now(),]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
