<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfileDosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('profilDosen', function (Blueprint $table) {
            $table->increments('id_profilDosen');
            $table->string('email')->unique();
            $table->bigInteger('hpDosen');
            $table->string('fileFoto')->nullable();
            $table->integer('dosen_id')->unsigned()->nullable();
            $table->foreign('dosen_id')->references('id_dosen')->on('dosen')->onDelete('cascade');
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
        Schema::drop('profilDosen');

    }
}
