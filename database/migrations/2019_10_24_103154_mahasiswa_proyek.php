<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MahasiswaProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mahasiswaProyek', function (Blueprint $table) {
            $table->increments('id_mahasiswaProyek');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('kelasProyek_id')->unsigned()->nullable();
            $table->integer('periode_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('mahasiswa_id')->on('users')->onDelete('cascade');
            $table->foreign('kelasProyek_id')->references('id_kelasProyek')->on('kelasProyek')->onDelete('cascade');
            $table->foreign('periode_id')->references('id_periode')->on('periode')->onDelete('cascade');
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
        Schema::drop('mahasiswaProyek');

    }
}
