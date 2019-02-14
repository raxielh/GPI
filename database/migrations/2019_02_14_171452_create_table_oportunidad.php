<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOportunidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_oportunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compromisos_id')->unsigned();
            $table->date('fecha_fin_compromiso');
            $table->date('fecha_real_entrega');
            $table->timestamps();
            $table->foreign('compromisos_id')->references('id')->on('compromisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_oportunidades');
    }
}
