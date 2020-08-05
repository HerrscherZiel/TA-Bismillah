<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Milestone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('milestone', function (Blueprint $table) {
            $table->increments('id_milestone');
            $table->string('milestone');
            $table->string('statusMilestone');
            $table->date('tglTarget');
            $table->date('tglPerkiraan');
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
        Schema::drop('milestone');
    }
}
