<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned();
            $table->integer('cargos_id')->unsigned();
            $table->integer('direciones_areas_id')->unsigned();
            $table->integer('empleado_estados_id')->unsigned();
            $table->integer('empleados_tipos_id')->unsigned();
            $table->timestamps();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('cargos_id')->references('id')->on('cargos');
            $table->foreign('empleado_estados_id')->references('id')->on('empleado_estados');
            $table->foreign('empleados_tipos_id')->references('id')->on('empleados_tipos');
            $table->foreign('direciones_areas_id')->references('id')->on('direciones_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
