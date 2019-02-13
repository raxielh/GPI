<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActividadesCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();
        });

        DB::table('actividades_categoria')->insert([
            'id' => 0,
            'descripcion_larga' => 'Otros',
            'descripcion_corta' => 'Otros',
        ]);

        DB::table('actividades_categoria')->insert([
            'id' => 1,
            'descripcion_larga' => 'ADMINISTRACION',
            'descripcion_corta' => 'ADMINISTRACION',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_categoria');
    }
}
