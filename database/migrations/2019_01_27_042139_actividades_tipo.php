<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActividadesTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_tipo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();
        });


        DB::table('actividades_tipo')->insert([
            'descripcion_larga' => 'Ingreso',
            'descripcion_corta' => 'Ingreso',
        ]);


        DB::table('actividades_tipo')->insert([
            'descripcion_larga' => 'Salida',
            'descripcion_corta' => 'Salida',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_tipo');
    }
}
