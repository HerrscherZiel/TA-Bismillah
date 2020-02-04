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
            $table->string('namaDosen');
            $table->string('statusUser')->default("dosen");
//            $table->integer('userStatus_id')->unsigned()->nullable();
//            $table->foreign('userStatus_id')->references('id_userStatus')->on('userStatus')->onDelete('cascade');
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
