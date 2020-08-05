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
            $table->integer('kelompokProyek_id')->unsigned()->nullable();
            $table->string('statusUsul')->nullable();
            $table->foreign('kelompokProyek_id')->references('id_kelompokProyek')->on('kelompokProyek')
                                                            ->onDelete('cascade')->onUpdate('cascade');
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
