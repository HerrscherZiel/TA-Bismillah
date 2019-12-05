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
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('statusProyek')->unsigned()->nullable();
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('statusProyek')->references('id_status')->on('status')->onDelete('cascade');
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
    }
}
