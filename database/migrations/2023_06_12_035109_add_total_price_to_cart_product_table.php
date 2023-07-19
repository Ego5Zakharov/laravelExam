<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPriceToCartProductTable extends Migration
{

    public function up()
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->decimal('total_price', 8, 2)->nullable();
        });
    }


    public function down()
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->dropColumn('total_price');
        });
    }
}
