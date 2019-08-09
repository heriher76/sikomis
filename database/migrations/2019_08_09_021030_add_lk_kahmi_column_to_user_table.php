<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLkKahmiColumnToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->boolean('sudahLK')->nullable();
          $table->boolean('sudahUpgrading')->nullable();
          $table->boolean('sudahPelantikan')->nullable();
          $table->integer('kahmi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('sudahLK');
          $table->dropColumn('sudahUpgrading');
          $table->dropColumn('sudahPelantikan');
          $table->dropColumn('kahmi');
        });
    }
}
