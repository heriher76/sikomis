<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKahmiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kahmi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('birthplace')->nullable();
            $table->date('birthday')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('formals')->nullable();
            $table->text('organizations')->nullable();
            $table->text('jobs')->nullable();
            $table->text('trainings')->nullable();
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
        Schema::dropIfExists('kahmi');
    }
}
