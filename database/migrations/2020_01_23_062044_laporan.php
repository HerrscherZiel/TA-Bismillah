<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('id_laporan');
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->date('tglKirim');
            $table->integer('kelompokProyek_id')->unsigned()->nullable();
            $table->foreign('kelompokProyek_id')->references('id_kelompokProyek')
                            ->on('kelompokproyek')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('laporan');
    }
}
