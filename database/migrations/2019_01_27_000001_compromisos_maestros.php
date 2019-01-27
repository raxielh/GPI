<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompromisosMaestros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromisos_maestros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('direciones_areas_id')->unsigned();
            $table->integer('respon_id')->unsigned();
            $table->integer('respon_revi_id')->unsigned();
            $table->integer('cargo_respon_revi_id')->unsigned();
            $table->date('fecha_compromiso');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->timestamps();
            $table->foreign('direciones_areas_id')->references('id')->on('direciones_areas');
            $table->foreign('respon_id')->references('id')->on('personas');
            $table->foreign('respon_revi_id')->references('id')->on('personas');
            $table->foreign('cargo_respon_revi_id')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compromisos_maestros');
    }
}
