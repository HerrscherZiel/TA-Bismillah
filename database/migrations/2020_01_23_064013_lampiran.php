<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lampiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lampiran', function (Blueprint $table) {
            $table->increments('id_lampiran');
            $table->string('lampiran');
            $table->string('fileLampiran', 255);
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
        Schema::drop('lampiran');
    }
}
