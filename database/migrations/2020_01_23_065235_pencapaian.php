<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pencapaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pencapaian', function (Blueprint $table) {
            $table->increments('id_pencapaian');
            $table->string('pencapaian');
            $table->string('deskripsi');
            $table->integer('laporan_id')->unsigned()->nullable();
            $table->foreign('laporan_id')->references('id_laporan')->on('laporan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('pencapaian');
    }
}
