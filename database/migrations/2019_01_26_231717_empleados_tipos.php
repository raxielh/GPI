<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpleadosTipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();
        });


        DB::table('empleados_tipos')->insert([
            'descripcion_larga' => 'Interno',
            'descripcion_corta' => 'Contrato interno',
        ]);

        DB::table('empleados_tipos')->insert([
            'descripcion_larga' => 'Externo',
            'descripcion_corta' => 'Externo',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados_tipos');
    }
}
