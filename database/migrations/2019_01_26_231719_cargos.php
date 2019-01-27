<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cargos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('descripcion_larga')->unique();
          $table->string('descripcion_corta')->unique();
          $table->timestamps();
      });

      DB::table('cargos')->insert([
          'descripcion_larga' => 'Gerente',
          'descripcion_corta' => 'Gerente',
      ]);

      DB::table('cargos')->insert([
          'descripcion_larga' => 'Residente de Obra',
          'descripcion_corta' => 'Reside Obra',
      ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('cargos');
    }
}
