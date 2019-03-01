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
            $table->unsignedInteger('id_project')->nullable();
            $table->foreign('id_project')->references('id')->on('project');
            $table->unsignedInteger('id_profesi')->nullable();;
            $table->foreign('id_profesi')->references('id')->on('profesi');
            $table->unsignedInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedInteger('id_transaksi')->nullable();
            $table->foreign('id_transaksi')->references('id')->on('transaksi');
            $table->string('status')->default('order');
            $table->text('url_gambar');
            $table->text('pesan');
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
