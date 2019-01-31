<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compromisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromisos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compromisos_maestros_id')->unsigned();
            $table->text('compromisos_laborales');
            $table->integer('nro_seguimientos');
            $table->integer('proyecto_id')->unsigned();
            $table->integer('responsable_id')->unsigned();
            $table->date('fecha_inicio_compromiso');
            $table->date('fecha_fin_compromiso');
            $table->date('fecha_real_entrega');
            $table->integer('dias_avance_retraso');
            $table->integer('estado_compromiso_id')->unsigned();
            $table->integer('causas_id')->unsigned()->default(0);
            $table->string('descripcion_causa')->nullable();

            $table->timestamps();
            $table->foreign('compromisos_maestros_id')->references('id')->on('compromisos_maestros');
            $table->foreign('proyecto_id')->references('id')->on('proyecto');
            $table->foreign('responsable_id')->references('id')->on('empleados');
            $table->foreign('estado_compromiso_id')->references('id')->on('estado_compromiso');
            $table->foreign('causas_id')->references('id')->on('causas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compromisos');
    }
}
