<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modul', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_modul');
            $table->string('nama_menu')->nullable(true);
            $table->timestamps();
        });

        Schema::create('unit_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_unit',255)->nullable(true);
            $table->text('alamat')->nullable(true);
            $table->timestamps();
        });

        Schema::create('level_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_unit');
            $table->string('level',100);
            $table->timestamps();

            $table->foreign('id_unit')->references('id')->on('unit_user')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('level_akses', function (Blueprint $table) {
            $table->unsignedInteger('id_level');
            $table->unsignedInteger('id_modul');
            $table->boolean('l')->default(false); //lihat
            $table->boolean('d')->default(false); //detail
            $table->boolean('t')->default(false); //tambah
            $table->boolean('u')->default(false); //ubah
            $table->boolean('h')->default(false); //hapus
            $table->timestamps();

            $table->foreign('id_level')->references('id')->on('level_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_modul')->references('id')->on('modul')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_level')->nullable(true);
            $table->string('nama',100)->nullable(true);
            $table->string('email',100)->nullable(true);
            $table->string('foto',100)->nullable(true);
            $table->string('username',100)->unique()->nullable(true);
            $table->string('password',255)->nullable(true);
            $table->text('t_pwd',255)->nullable(true);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_level')->references('id')->on('level_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
