<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proyek', function (Blueprint $table) {
            $table->increments('id_proyek');
            $table->string('judul')->unique();
            $table->text('deskripsi')->nullable();
            $table->integer('statusProyek')->unsigned()->nullable();
            $table->integer('kelasProyek_id')->unsigned()->nullable();
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
        Schema::drop('proyek');
    }
}