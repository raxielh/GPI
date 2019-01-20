<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipomenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipomenus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->unique();
            $table->timestamps();
        });

        DB::table('tipomenus')->insert([
            'descripcion' => 'directorio',
        ]);

        DB::table('tipomenus')->insert([
            'descripcion' => 'archivo',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipomenus');
    }
}
