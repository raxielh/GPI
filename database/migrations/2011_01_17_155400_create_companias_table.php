<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('nit')->unique();
            $table->string('representante_legal');
            $table->string('telefono')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        DB::table('companias')->insert([
            'descripcion' => 'GPI',
            'nit' => '123456',
            'representante_legal' => 'Sebastian Jaramillo',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companias');
    }
}
