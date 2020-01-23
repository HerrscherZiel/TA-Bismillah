<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProyekPilihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proyekpilihan', function (Blueprint $table) {
            $table->increments('id_proyekPilihan');
            $table->integer('kelompokProyek_id')->unsigned()->nullable();
            $table->integer('proyek_id')->unsigned()->nullable();
            $table->foreign('kelompokProyek_id')->references('id_kelompokProyek')->on('kelompokproyek')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proyek_id')->references('id_proyek')->on('proyek')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('proyekpilihan');

    }
}
