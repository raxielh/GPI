<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpleadoEstados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_larga')->unique();
            $table->string('descripcion_corta')->unique();
            $table->timestamps();

        });

        DB::table('empleado_estados')->insert([
            'descripcion_larga' => 'Activo',
            'descripcion_corta' => 'Activo',
        ]);

        DB::table('empleado_estados')->insert([
            'descripcion_larga' => 'Retirado',
            'descripcion_corta' => 'Retirado',
        ]);

        DB::table('empleado_estados')->insert([
            'descripcion_larga' => 'Suspendido',
            'descripcion_corta' => 'Suspendido',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_estados');
    }
}
