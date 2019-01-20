<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoidentificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoidentificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();
        });

        DB::table('tipoidentificacion')->insert([
            'descripcion_larga' => 'Cédula de ciudadanía',
            'descripcion_corta' => 'CC',
        ]);
        DB::table('tipoidentificacion')->insert([
            'descripcion_larga' => 'Tarjeta de identidad',
            'descripcion_corta' => 'TI',
        ]);
        DB::table('tipoidentificacion')->insert([
            'descripcion_larga' => 'Tarjeta pasaporte',
            'descripcion_corta' => 'TP',
        ]);
        DB::table('tipoidentificacion')->insert([
            'descripcion_larga' => 'Cédula de extranjería ',
            'descripcion_corta' => 'CE',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoidentificacion');
    }
}
