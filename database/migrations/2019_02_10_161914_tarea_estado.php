<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TareaEstado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea_estado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();
        });


                DB::table('tarea_estado')->insert([
                    'descripcion_larga' => 'En Curso',
                    'descripcion_corta' => 'En Curso',
                ]);

                DB::table('tarea_estado')->insert([
                    'descripcion_larga' => 'Finalizado',
                    'descripcion_corta' => 'Fibalizado',
                ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarea_estado');
    }
}
