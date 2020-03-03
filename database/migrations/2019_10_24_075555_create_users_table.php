<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('users', function (Blueprint $table) {
//            $table->increments('id_user');
//            $table->string('username');
////            $table->string('email')->unique();
////            $table->timestamp('email_verified_at')->nullable();
//            $table->string('password');
////            $table->string('user');
//            $table->integer('dosen_id')->unsigned()->nullable();
//            $table->integer('mahasiswa_id')->unsigned()->nullable();
//            $table->integer('admin_id')->unsigned()->nullable();
//            $table->foreign('mahasiswa_id')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('dosen_id')->references('id_dosen')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('admin_id')->references('id_admin')->on('admin')->onDelete('cascade')->onUpdate('cascade');
////            $table->rememberToken();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
