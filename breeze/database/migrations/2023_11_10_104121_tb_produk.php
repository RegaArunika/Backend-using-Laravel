<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produks', function(Blueprint $table) {
            $table->id('id_produk');
            $table->string('kode_produk', 100);
            $table->integer('nama_produk');
            $table->text('desk_produk');
            $table->string('img_produk', 45);
            $table->string('lokasi', 100);
            $table->integer('id_toko');
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

    }
};