<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->string('last_name', 30)->after('name');
            $table->string('phone', 20)->after('last_name');
            $table->string('company', 30)->nullable()->after('phone');
            $table->string('address', 100)->nullable()->after('company');
            $table->unsignedInteger('role_id')->after('address');
            $table->unsignedInteger('city_id')->after('role_id');
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
            $table->renameColumn('first_name', 'name');
            $table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('company');
            $table->dropColumn('address');
            $table->dropColumn('role_id');
            $table->dropColumn('city_id');
        });
    }
}
