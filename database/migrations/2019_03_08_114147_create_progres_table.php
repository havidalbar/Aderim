<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_project')->nullable();
            $table->foreign('id_project')->references('id')->on('project');
            $table->unsignedInteger('id_profesi')->nullable();
            $table->foreign('id_profesi')->references('id')->on('profesi');
            $table->unsignedInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedInteger('id_order')->nullable();
            $table->foreign('id_order')->references('id')->on('order');
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
        Schema::dropIfExists('progres');
    }
}
