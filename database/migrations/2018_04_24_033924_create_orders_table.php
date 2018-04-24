<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('price');
            $table->unsignedInteger('status');
            $table->string('customer_name', 50);
            $table->string('customer_email', 50);
            $table->string('phone', 50);
            $table->string('billing_name', 50);
            $table->string('billing_address', 150);
            $table->string('shipping_name', 50);
            $table->string('shipping_address', 150);
            $table->string('note', 100)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
