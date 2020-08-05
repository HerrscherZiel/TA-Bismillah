<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgendaSelanjutnya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('agendaSelanjutnya', function (Blueprint $table) {
            $table->increments('id_agendaSelanjutnya');
            $table->string('agendaSelanjutnya');
            $table->string('deskripsi');
            $table->integer('laporan_id')->unsigned()->nullable();
            $table->foreign('laporan_id')->references('id_laporan')
                    ->on('laporan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('agendaSelanjutnya');
    }
}
