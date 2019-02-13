<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->integer('sede_id')->unsigned();
            $table->integer('estado_proyecto_id')->unsigned();
            $table->timestamps();
            $table->foreign('sede_id')->references('id')->on('sedes');
            $table->foreign('estado_proyecto_id')->references('id')->on('estado_proyecto');
        });

        DB::table('proyecto')->insert([
            'descripcion_larga' => 'General',
            'descripcion_corta' => 'General',
            'sede_id' => 1,
            'estado_proyecto_id' => 1,
        ]);

        DB::table('proyecto')->insert([
            'descripcion_larga' => 'San Ventto',
            'descripcion_corta' => 'San Ventto',
            'sede_id' => 1,
            'estado_proyecto_id' => 1,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}
