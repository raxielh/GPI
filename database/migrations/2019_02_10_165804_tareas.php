<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('users_id_quien')->unsigned();
            $table->integer('tipo_tarea_id')->unsigned();
            $table->integer('tarea_estado_id')->unsigned();
            $table->integer('proyecto_id')->unsigned();
            $table->date('fecha_propuesta_entrega');
            $table->date('fecha_entrega')->nullable();
            $table->float('porcentage')->unsigned();
            $table->string('descripcion_taera')->nullable();
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('users_id_quien')->references('id')->on('users');
            $table->foreign('tipo_tarea_id')->references('id')->on('tipo_tarea');
            $table->foreign('proyecto_id')->references('id')->on('proyecto');
            $table->foreign('tarea_estado_id')->references('id')->on('tarea_estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
