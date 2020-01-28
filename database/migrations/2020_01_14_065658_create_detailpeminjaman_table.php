<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailpeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->integer('id_peminjaman')->unsigned();
           $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_buku')->unsigned();
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('qty');
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
        Schema::dropIfExists('detail');
    }
}
