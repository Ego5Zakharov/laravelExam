<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('quantity')->nullable();

            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
