<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_project');
            $table->foreign('id_project')->references('id')->on('project')->nullable();
            $table->unsignedInteger('id_profesi');
            $table->foreign('id_profesi')->references('id')->on('profesi')->nullable();
            $table->unsignedInteger('id_order');
            $table->foreign('id_order')->references('id')->on('users')->nullable();
            $table->text('url_gambar');
            $table->text('pesan');
            $table->unsignedInteger('id_transaksi');
            $table->foreign('id_transaksi')->references('id')->on('transaksi')->nullable();
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
        Schema::dropIfExists('order');
    }
}
