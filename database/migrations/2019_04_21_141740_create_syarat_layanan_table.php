<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyaratLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarat_layanan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_data_layanan')->nullable(true);
            $table->text('syarat')->nullable(true);
            $table->timestamps();

            $table->foreign('id_data_layanan')->references('id')->on('data_layanan')->onDelete('cascade')->onUpdate('cascade');
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
