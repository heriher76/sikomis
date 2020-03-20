<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddinfokahmiUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('formals')->nullable();
            $table->text('organizations')->nullable();
            $table->text('jobs')->nullable();
            $table->text('trainings')->nullable();
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
          $table->dropColumn('formals');
          $table->dropColumn('organizations');
          $table->dropColumn('jobs');
          $table->dropColumn('trainings');
        });
    }
}
