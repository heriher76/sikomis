<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKelupaanColumnToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->longText('alamatAsal')->after('phone')->nullable();
          $table->longText('alamatSekarang')->after('ttl')->nullable();
          $table->longText('alasan')->after('harapan')->nullable();
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
          $table->dropColumn('alamatAsal');
          $table->dropColumn('alamatSekarang');
          $table->dropColumn('alasan');
        });
    }
}
