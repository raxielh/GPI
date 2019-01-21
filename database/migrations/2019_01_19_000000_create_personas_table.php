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
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->integer('tipoidentificacion_id')->unsigned();
            $table->string('identificacion')->unique();
            $table->integer('generos_id')->unsigned();
            $table->string('fijo')->nullable();
            $table->string('celular')->nullable();
            $table->string('direccion')->nullable();
            $table->timestamps();
            $table->foreign('tipoidentificacion_id')->references('id')->on('tipoidentificacion');
            $table->foreign('generos_id')->references('id')->on('generos');
            $table->unique(['tipoidentificacion_id', 'identificacion'], 'indice_tipoidentificacion_identificacion');
        });

        DB::table('personas')->insert([
            'primer_nombre' => 'Rodrigo',
            'segundo_nombre' => 'Junior',
            'primer_apellido' => 'Garcia',
            'segundo_apellido' => 'Hoyos',
            'tipoidentificacion_id' => 1,
            'identificacion' => '1067879307',
            'generos_id' => 1,
            'fijo' => '7898442',
            'celular' => '3106763499',
            'direccion' => 'Cr 8c #10-83',
        ]);

        DB::table('personas')->insert([
            'primer_nombre' => 'Nombre prueba',
            'segundo_nombre' => 'Segundo nombre prueba',
            'primer_apellido' => 'Apellido prueba',
            'segundo_apellido' => 'Segundo apellido prueba',
            'tipoidentificacion_id' => 1,
            'identificacion' => '10678793',
            'generos_id' => 1,
            'fijo' => '79789',
            'celular' => '3106763499',
            'direccion' => 'Cr 8c #10-73',
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
