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
            $table->string('descripcion')->unique();
            $table->timestamps();
        });

        DB::table('rolesmaestros')->insert([
            'descripcion' => 'Super Admin',
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
