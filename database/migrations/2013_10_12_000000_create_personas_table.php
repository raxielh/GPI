<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('tipoidentificacion_id')->unsigned();
            $table->string('identificacion')->unique();
            $table->string('fijo');
            $table->string('celular');
            $table->string('direccion');
            $table->timestamps();
            $table->foreign('tipoidentificacion_id')->references('id')->on('tipoidentificacion');
        });

        DB::table('personas')->insert([
            'nombres' => 'Rodrigo Junior',
            'apellidos' => 'Garcia Hoyos',
            'tipoidentificacion_id' => 1,
            'identificacion' => '1067879307',
            'fijo' => '7898442',
            'celular' => '3106763499',
            'direccion' => 'Cr 8c #10-83',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
