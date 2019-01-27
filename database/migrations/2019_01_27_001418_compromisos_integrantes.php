<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompromisosIntegrantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromisos_integrantes', function (Blueprint $table) {
            $table->increments('id');
              $table->integer('integrantes_id')->unsigned();
              $table->integer('compromisos_maestros_id')->unsigned();
            $table->timestamps();
            $table->foreign('integrantes_id')->references('id')->on('personas');
            $table->foreign('compromisos_maestros_id')->references('id')->on('personas');
            $table->unique(['integrantes_id', 'compromisos_maestros_id'], 'indice_compromisos_integrantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compromisos_integrantes');
    }
}
