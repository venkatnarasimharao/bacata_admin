<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_authentication', function (Blueprint $table) {
		$table->increments('userid');
		$table->string('username', 100);
		$table->string('email')->unique();
		$table->string('password', 255);
		$table->string('phonenumber', 20);
		$table->string('role')->default('user');
		$table->integer('points')->default(200);
		$table->integer('status')->default(0);
		$table->string('token', 255);
		$table->string('profileUrl', 255);
		$table->string('provider', 255);
		$table->timestamp('login_time')->useCurrent();
		$table->timestamp('logout_time')->useCurrent();
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
        Schema::dropIfExists('users_authentication');
    }
}
