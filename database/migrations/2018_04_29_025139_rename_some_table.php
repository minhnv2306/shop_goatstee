<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('store_product', 'store_products');
        Schema::rename('cart_product', 'cart_products');
        Schema::rename('product_order', 'product_orders');
        Schema::rename('discount_order', 'discount_orders');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('store_products', 'store_product');
        Schema::rename('cart_product', 'cart_products');
        Schema::rename('product_orders', 'product_order');
        Schema::rename('discount_orders', 'discount_order');
    }
}
