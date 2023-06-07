<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // сумма заказа
            $table->decimal('amount', 12, 2);
            // сумма скидки
            $table->decimal('discount_amount', 12, 2);
            // итоговая сумма к удалению
            $table->decimal('user_amount', 12, 2);
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
