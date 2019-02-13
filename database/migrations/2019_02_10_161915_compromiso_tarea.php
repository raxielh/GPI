<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompromisoTarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromiso_tarea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compromisos_id')->unsigned();
            $table->integer('tarea_estado_id')->unsigned();
            $table->integer('tipo_tarea_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->date('fecha_propuesta_entrega');
            $table->date('fecha_entrega')->nullable();
            $table->integer('porcentage')->unsigned();
            $table->string('descripcion_taera')->nullable();
            $table->timestamps();
            $table->foreign('compromisos_id')->references('id')->on('compromisos');
            $table->foreign('tarea_estado_id')->references('id')->on('tarea_estado');
            $table->foreign('users_id')->references('id')->on('users');
              $table->foreign('tipo_tarea_id')->references('id')->on('tipo_tarea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compromiso_tarea');
    }
}
