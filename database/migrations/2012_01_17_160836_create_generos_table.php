<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();
        });

        DB::table('generos')->insert([
            'descripcion_larga' => 'Masculino',
            'descripcion_corta' => 'M',
        ]);

        DB::table('generos')->insert([
            'descripcion_larga' => 'Femenino',
            'descripcion_corta' => 'F',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generos');
    }
}
