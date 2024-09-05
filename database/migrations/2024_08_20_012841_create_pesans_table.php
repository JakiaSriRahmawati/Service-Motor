<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('merek_motor');
            $table->string('mesin_motor');
            $table->string('seri_motor');
            $table->string('no_plat');
            $table->string('jenis_service');
            $table->string('deskripsi');
            $table->date('tgl_service');
            $table->enum('status_orderan', ['belum diterima', 'diterima'])->default('belum diterima');
            $table->enum('status_pembayaran', ['belum dibayar', 'Sedang dikonfirmasi', 'lunas', 'dibatalkan'])->default('belum dibayar');
            $table->enum('status_service', ['belum dikerjakan', 'dikerjakan', 'Selesai'])->default('belum dikerjakan');
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
        Schema::dropIfExists('pesans');
    }
}
