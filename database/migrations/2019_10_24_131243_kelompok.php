<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kelompokProyek', function (Blueprint $table) {
            $table->increments('id_kelompokProyek');
            $table->integer('mahasiswaProyek_id')->unsigned()->nullable();
            $table->string('pm');
            $table->string('judulPrioritas')->default(null);
            $table->integer('dosen_id')->unsigned()->nullable();
            $table->string('statusKelompok')->nullable();
            $table->foreign('mahasiswaProyek_id')->references('id_mahasiswaProyek')->on('mahasiswaProyek')
                                                                            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dosen_id')->references('id_dosen')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('kelompokProyek');

    }
}
