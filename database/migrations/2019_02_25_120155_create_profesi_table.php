<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_profesi');
            $table->unsignedInteger('id_profesi');
            $table->foreign('id_profesi')->references('id')->on('users')->nullable();
            $table->string('alamat');
            $table->integer('nohp');
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
        Schema::dropIfExists('profesi');
    }
}
