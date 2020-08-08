<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama','50');
            $table->string('no_hp','13');
            $table->string('alamat','50');
            $table->string('email')->unique();
            $table->timestamp('verifikasi_email')->nullable();
            $table->string('password');
            $table->bigInteger('id_apotek')->unsigned();
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_apotek')->references('id')->on('apoteks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasirs');
    }
}
