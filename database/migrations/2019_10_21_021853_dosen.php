<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('dosen', function (Blueprint $table) {
            $table->increments('id_dosen');
            $table->string('nip');
            $table->string('email');
            $table->string('namaDosen');
            $table->string('password');
            $table->string('passwordBackup');
            $table->string('statusUser')->default("Dosen");
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
        Schema::drop('dosen');
    }
}
