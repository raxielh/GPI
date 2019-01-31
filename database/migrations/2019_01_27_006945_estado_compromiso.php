<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstadoCompromiso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_compromiso', function (Blueprint $table) {
            $table->integer('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();
            $table->primary('id');
        });

        DB::table('estado_compromiso')->insert([
            'id' => '1',
            'descripcion_larga' => 'Inicial',
            'descripcion_corta' => 'Inicial',
         ]);

        DB::table('estado_compromiso')->insert([
            'id' => '2',
             'descripcion_larga' => 'Realizado SI',
             'descripcion_corta' => 'SI',
         ]);

         DB::table('estado_compromiso')->insert([
            'id' => '3',
             'descripcion_larga' => 'Realizado NO',
             'descripcion_corta' => 'NO',
         ]);

         DB::table('estado_compromiso')->insert([
            'id' => '4',
             'descripcion_larga' => 'Realizado CCR',
             'descripcion_corta' => 'CCR',
         ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_compromiso');
    }
}
