<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_data_layanan')->nullable(true);
            $table->unsignedInteger('id_unit')->nullable(true);
            $table->string('no_registrasi',100)->nullable(true);
            $table->text('perihal')->nullable(true);
            $table->dateTime('tgl_terima')->nullable(true);
            $table->dateTime('tgl_selesai')->nullable(true);
            $table->string('no_surat_pemohon',100)->nullable(true);
            $table->date('tgl_surat_pemohon')->nullable(true);
            $table->string('nama_pemohon',100)->nullable(true);
            $table->text('alamat_pemohon')->nullable(true);
            $table->string('nama_pengirim',100)->nullable(true);
            $table->string('no_telp_pemohon',100)->nullable(true);
            $table->string('kelengkapan_syarat',100)->nullable(true);
            $table->string('status_layanan',100)->nullable(true);
            $table->text('catatan')->nullable(true);
            $table->string('no_surat_terbit',100)->nullable(true);
            $table->date('tgl_surat_terbit',100)->nullable(true);
            $table->date('tgl_pengambilan',100)->nullable(true);
            $table->string('nama_pengambil',100)->nullable(true);
            $table->timestamps();

            $table->foreign('id_data_layanan')->references('id')->on('data_layanan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_unit')->references('id')->on('unit_user')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('data_syarat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_syarat_layanan')->nullable(true);
            $table->unsignedInteger('id_pelayanan')->nullable(true);
            $table->string('lampiran',100)->nullable(true);
            $table->timestamps();

            $table->foreign('id_syarat_layanan')->references('id')->on('data_layanan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pelayanan')->references('id')->on('data_layanan')->onDelete('cascade')->onUpdate('cascade');
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
