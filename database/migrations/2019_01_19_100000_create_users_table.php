<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('personas_id')->unsigned();
            $table->integer('rolesmaestros_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('personas_id')->references('id')->on('personas');
            $table->foreign('rolesmaestros_id')->references('id')->on('rolesmaestros');
        });

        DB::table('users')->insert([
            'username' => 'raxielh',
            'email' => 'rodrigo@gmail.com',
            'password' => '$2y$10$4w9KrJDA9yjzSM0MAnM2SuBYjx5LYgrau6HSjH3WZ36XMGpRlncQy',
            'personas_id' => 1,
            'rolesmaestros_id' => 1
        ]);

        DB::table('users')->insert([
            'username' => 'root',
            'email' => 'root@gmail.com',
            'password' => '$2y$10$4w9KrJDA9yjzSM0MAnM2SuBYjx5LYgrau6HSjH3WZ36XMGpRlncQy',
            'personas_id' => 1,
            'rolesmaestros_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
