<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfilMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('profilMahasiswa', function (Blueprint $table) {
            $table->increments('id_profilMahasiswa');
            $table->string('email')->unique();
            $table->string('ipk')->default('-');
            $table->string('sks')->default('-');
            $table->string('hpMahasiswa')->default('-');
            $table->string('keahlian')->default('-');
            $table->text('pengalaman')->default(NULL);
            $table->string('fileFoto', 255)->nullable();
            $table->integer('mahasiswa_id')->unsigned()->nullable();
            $table->foreign('mahasiswa_id')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
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
        //
        Schema::drop('profilMahasiswa');

    }
}
