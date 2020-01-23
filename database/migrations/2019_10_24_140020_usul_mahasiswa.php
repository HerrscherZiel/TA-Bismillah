<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsulMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usulMahasiswa', function (Blueprint $table) {
            $table->increments('id_usulMahasiswa');
            $table->string('judulUsul')->unique();
            $table->text('deskripsi')->nullable();
            $table->integer('mahasiswaProyek_id')->unsigned()->nullable();
            $table->integer('statusProyek')->unsigned()->nullable();
            $table->integer('kelasProyek_id')->unsigned()->nullable();
            $table->foreign('mahasiswaProyek_id')->references('id_mahasiswaProyek')->on('mahasiswaProyek')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('statusProyek')->references('id_status')->on('status')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kelasProyek_id')->references('id_kelasProyek')->on('kelasproyek')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('usulMahasiswa');

    }
}