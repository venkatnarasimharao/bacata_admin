<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user');
$table->integer('points')->default(200);
$table->integer('status')->default(0);
$table->string('provider', 50);
$table->timestamp('login_time')->useCurrent();
$table->timestamp('logout_time')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->drop(['role','points','status','provider','login_time','logout_time']);
        });
    }
}
