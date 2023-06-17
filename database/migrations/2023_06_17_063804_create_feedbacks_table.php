<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{

    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->text('comment');
            $table->double('rating');
            $table->boolean('visible');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
