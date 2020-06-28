<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_obat')->unsigned();
            $table->bigInteger('id_transaksi')->unsigned();
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('kuantitas');
            $table->integer('total');

            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('CASCADE');
            $table->foreign('id_transaksi')->references('id')->on('transaksis')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_obats');
    }
}
