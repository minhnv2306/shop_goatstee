<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSomeFieldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('washing')->change();
            $table->text('note_1')->change();
            $table->text('note_2')->change();
            $table->text('note_3')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('washing', 50)->change();
            $table->string('note_1', 100)->change();
            $table->string('note_2', 100)->change();
            $table->string('note_3', 100)->change();
        });
    }
}
