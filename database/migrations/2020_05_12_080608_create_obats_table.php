<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode_obat','5')->unique();
            $table->bigInteger('id_merk')->unsigned();
            $table->string('nama_produk', '50')->unique();
            $table->string('satuan','10');
            $table->integer('harga');
            $table->integer('stok');
            $table->integer('sisa_stok');
            $table->timestamps();

            $table->foreign('id_merk')->references('id')->on('merks')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obats');
    }
}
