<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('imagePath');
            $table->foreignId('product_id')->constrained('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
