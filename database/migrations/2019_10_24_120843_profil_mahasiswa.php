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
            $table->double('ipk');
            $table->integer('sks');
            $table->bigInteger('hpMahasiswa');
            $table->string('keahlian');
            $table->text('pengalaman');
            $table->string('fileFoto')->nullable();
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
