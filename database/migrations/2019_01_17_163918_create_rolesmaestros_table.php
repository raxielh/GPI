<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesmaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolesmaestros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_largo')->unique();
            $table->string('nombre_corto')->unique();
            $table->string('descripcion');
            $table->timestamps();
        });

        DB::table('rolesmaestros')->insert([
            'nombre_largo' => 'Super Admin',
            'nombre_corto' => 'SAdmin',
            'descripcion' => 'Dios del Sistema',
        ]);

        DB::table('rolesmaestros')->insert([
            'nombre_largo' => 'Administrador',
            'nombre_corto' => 'Admin',
            'descripcion' => 'Administrador del Sistema',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolesmaestros');
    }
}
