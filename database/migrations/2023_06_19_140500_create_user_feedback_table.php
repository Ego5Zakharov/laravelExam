<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('user_feedback', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('feedback_id')->constrained('feedbacks')->onDelete('cascade');

            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_feedback');
    }
}
