<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_transaksi')->unique();
            //$table->string('nama_pembeli', '50');
            //$table->integer('umur');
            $table->bigInteger('id_kasir')->unsigned();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->integer('total_bayar');
            $table->timestamps();

            $table->foreign('id_kasir')->references('id')->on('kasirs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
