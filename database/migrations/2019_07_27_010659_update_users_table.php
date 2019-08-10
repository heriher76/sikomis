<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('username')->nullable();
          $table->string('status')->nullable();
          $table->string('jk')->nullable();
          $table->string('phone')->nullable();
          $table->string('tempat')->nullable();
          $table->date('tanggalLahir')->nullable();
          $table->string('jurusan')->nullable();
          $table->string('angkatan')->nullable();
          $table->string('sma')->nullable();
          $table->string('lulusSma')->nullable();
          $table->string('smp')->nullable();
          $table->string('lulusSmp')->nullable();
          $table->string('sd')->nullable();
          $table->string('lulusSd')->nullable();
          $table->string('organisasiSma')->nullable();
          $table->string('organisasiKuliah')->nullable();
          $table->string('organisasiLainnya')->nullable();
          $table->string('penyakit')->nullable();
          $table->string('hobby')->nullable();
          $table->string('keahlian')->nullable();
          $table->string('bahasa')->nullable();
          $table->string('namaAyah')->nullable();
          $table->string('namaIbu')->nullable();
          $table->string('jumlahSaudara')->nullable();
          $table->string('anakKeberapa')->nullable();
          $table->longText('harapan')->nullable();
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
          $table->dropColumn('username');
          $table->dropColumn('status');
          $table->dropColumn('jk');
          $table->dropColumn('phone');
          $table->dropColumn('tempat');
          $table->dropColumn('tanggalLahir');
          $table->dropColumn('jurusan');
          $table->dropColumn('angkatan');
          $table->dropColumn('sma');
          $table->dropColumn('lulusSma');
          $table->dropColumn('smp');
          $table->dropColumn('lulusSmp');
          $table->dropColumn('sd');
          $table->dropColumn('lulusSd');
          $table->dropColumn('organisasiSma');
          $table->dropColumn('organisasiKuliah');
          $table->dropColumn('organisasiLainnya');
          $table->dropColumn('penyakit');
          $table->dropColumn('hobby');
          $table->dropColumn('keahlian');
          $table->dropColumn('bahasa');
          $table->dropColumn('namaAyah');
          $table->dropColumn('namaIbu');
          $table->dropColumn('lulusSd');
          $table->dropColumn('jumlahSaudara');
          $table->dropColumn('anakKeberapa');
          $table->dropColumn('harapan');
        });
    }
}
