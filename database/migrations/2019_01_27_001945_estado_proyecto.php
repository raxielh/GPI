<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstadoProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_proyecto', function (Blueprint $table) {
            $table->integer('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();
            $table->primary('id');
        });



        DB::table('estado_proyecto')->insert([
           'id' => '1',
            'descripcion_larga' => 'Activo',
            'descripcion_corta' => 'Activo',
        ]);

        DB::table('estado_proyecto')->insert([
           'id' => '2',
            'descripcion_larga' => 'Inactivo',
            'descripcion_corta' => 'Inactivo',
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_proyecto');
    }
}
