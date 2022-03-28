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
            $table->string('email')->unique();
            $table->string('namaAdmin');
            $table->string('password');
            $table->string('passwordBackup');
            $table->string('statusUser')->default("Admin");
            $table->timestamps();
        });

        DB::table('admin')->insert(
            array(
                'nip' => '11928391238129',
                'email' => 'admin@mail.com',
                'namaAdmin' => 'admin',
                'statusUser' => 'SuperAdmin',
                'password' => bcrypt('admin123'),
                'passwordBackup' => bcrypt('admin123'),
            )
        );

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
