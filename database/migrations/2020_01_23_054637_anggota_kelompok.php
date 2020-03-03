<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnggotaKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('anggotaKelompok', function (Blueprint $table) {
            $table->increments('id_anggotaKelompok');
            $table->integer('kelompokProyek_id')->unsigned()->nullable();
            $table->tinyInteger('isPM')->default(1);
            $table->string('statusAnggota')->nullable();
            $table->foreign('kelompokProyek_id')->references('id_kelompokProyek')->on('kelompokproyek')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('anggotaKelompok');
    }
}
