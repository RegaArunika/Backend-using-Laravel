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
        Schema::create('tb_toko', function(Blueprint $table) {
            $table->id('id_toko');
            $table->string('nm_toko', 50);
            $table->text('desk_toko');
            $table->string('location');
            $table->string('logo_toko', 45);
            $table->string('kontak', 50);
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
