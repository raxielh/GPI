<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_padre')->unsigned();
            $table->string('descripcion');
            $table->string('icono')->nullable();
            $table->string('ruta');
            $table->integer('tipomenu_id')->unsigned();
            $table->integer('orden');
            $table->timestamps();
            $table->foreign('tipomenu_id')->references('id')->on('tipomenus');
            $table->foreign('id_padre')->references('id')->on('menus');
        });









    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
