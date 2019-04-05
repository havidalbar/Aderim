<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namagambar');
            $table->string('namaProject');
            $table->text('deskripsi');
            $table->text('spesifikasi');
            $table->string('daerah');
            $table->string('category');
            $table->unsignedInteger('estimasi');
            $table->unsignedInteger('id_profesi');
            $table->foreign('id_profesi')->references('id')->on('profesi')->nullable();
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
        Schema::dropIfExists('project');
    }
}
