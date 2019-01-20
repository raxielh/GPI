<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->unique();
            $table->boolean('crear');
            $table->boolean('leer');
            $table->boolean('editar');
            $table->boolean('borrar');
            $table->boolean('proceso1');
            $table->string('descripcion_proceso1');
            $table->boolean('proceso2');
            $table->string('descripcion_proceso2');
            $table->boolean('proceso3');
            $table->string('descripcion_proceso3');
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
        Schema::dropIfExists('permisos');
    }
}
