<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatkulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matkul', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('kode', 7)->unique();
            $table->string('nama', 50);
            $table->string('sks', 6);
            $table->string('semester', 2);
            $table->string('prasyarat', 50)->nullable();
            $table->longText('deskripsi', 200)->nullable();
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
        Schema::dropIfExists('matkul');
    }
}
