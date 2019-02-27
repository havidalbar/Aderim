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
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->nullable();
            $table->string('alamat');
            $table->integer('nohp');
            $table->string('job_title');
            $table->string('url_image');
            $table->integer('status')->nullable();
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
