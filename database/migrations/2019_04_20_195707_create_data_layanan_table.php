<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_layanan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_unit_pengolah')->nullable(true);
            $table->unsignedInteger('id_jenis_layanan')->nullable(true);
            $table->unsignedInteger('id_output')->nullable(true);
            $table->string('nama_layanan',100)->nullable(true);
            $table->integer('lama_layanan')->nullable(true);
            $table->string('biaya')->nullable(true);
            $table->timestamps();

            $table->foreign('id_unit_pengolah')->references('id')->on('unit_pengolah')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jenis_layanan')->references('id')->on('jenis_layanan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_output')->references('id')->on('output')->onDelete('cascade')->onUpdate('cascade');
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
