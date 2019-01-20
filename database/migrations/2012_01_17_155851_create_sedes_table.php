<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('companias_id')->unsigned();
            $table->timestamps();
            $table->foreign('companias_id')->references('id')->on('companias');

        });

        DB::table('sedes')->insert([
            'descripcion' => 'GPI Principal',
            'companias_id' => 1,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sedes');
    }
}
