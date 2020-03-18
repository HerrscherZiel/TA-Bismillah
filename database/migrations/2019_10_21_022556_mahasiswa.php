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
            $table->string('username');
            $table->string('password');
            $table->string('passwordBackup');
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
