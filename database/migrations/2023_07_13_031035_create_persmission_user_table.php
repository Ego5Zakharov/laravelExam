<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersmissionUserTable extends Migration
{
    public function up()
    {
        Schema::create('persmission_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained('permissions')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('persmission_user');
    }
}
