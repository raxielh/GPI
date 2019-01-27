<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rolesmaestros_id')->unsigned();
            $table->integer('menus_id')->unsigned();
            $table->integer('permisos_id')->unsigned();
            $table->timestamps();
            $table->foreign('rolesmaestros_id')->references('id')->on('rolesmaestros');
            $table->foreign('menus_id')->references('id')->on('menus');
            $table->foreign('permisos_id')->references('id')->on('permisos');
            $table->unique(['rolesmaestros_id', 'menus_id'], 'indice_roles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
