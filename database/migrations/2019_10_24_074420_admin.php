<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('nip');
            $table->string('namaAdmin');
            $table->string('statusUser')->default("admin");
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
        Schema::drop('admin');

    }
}
