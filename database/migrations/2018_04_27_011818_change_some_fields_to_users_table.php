<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSomeFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 50)->nullable()->change();
            $table->string('last_name', 50)->nullable()->change();
            $table->string('phone', 50)->nullable()->change();
            $table->unsignedInteger('city_id')->nullable()->change();
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
            $table->string('first_name', 50)->nullable(false)->change();
            $table->string('last_name', 50)->nullable(false)->change();
            $table->string('phone', 50)->nullable(false)->change();
            $table->unsignedInteger('city_id')->nullable(false)->change();
        });
    }
}
