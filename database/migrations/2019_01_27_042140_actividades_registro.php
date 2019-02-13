<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActividadesRegistro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_registro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actividades_id')->unsigned();
            $table->integer('actividades_tipo_id')->unsigned();
            $table->integer('empleados_id')->unsigned();
            $table->date('fecha');
            $table->time('hora');
            $table->string('observacion')->nullable();
            $table->timestamps();
            $table->foreign('actividades_id')->references('id')->on('actividades');
            $table->foreign('actividades_tipo_id')->references('id')->on('actividades_tipo');
            $table->foreign('empleados_id')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_registro');
    }
}
