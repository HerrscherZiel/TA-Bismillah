<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id_mahasiswa');
            $table->string('nim');
            $table->string('namaMahasiswa');
            $table->string('statusUser')->default("Mahasiswa");
//            $table->integer('userStatus_id')->unsigned()->nullable();
//            $table->integer('kelasProyek_id')->unsigned()->nullable();
//            $table->integer('periode_id')->unsigned()->nullable();
//            $table->foreign('userStatus_id')->references('id_userStatus')->on('userStatus')->onDelete('cascade');
//            $table->foreign('kelasProyek_id')->references('id_kelasProyek')->on('kelasProyek')->onDelete('cascade');
//            $table->foreign('periode_id')->references('id_periode')->on('periode')->onDelete('cascade');
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
        Schema::drop('mahasiswa');
    }
}
