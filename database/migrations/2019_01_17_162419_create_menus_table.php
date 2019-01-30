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



        DB::unprepared("
        INSERT INTO public.menus VALUES (0, 0, '', NULL, '', 1, 0, NULL, NULL);
        INSERT INTO public.menus VALUES (1, 0, '', NULL, '', 1, 0, NULL, NULL);
        
        INSERT INTO public.menus VALUES (2, 1, 'App', 'desktop_mac', 'javascript:void(0);', 1, 0, '2019-01-27 19:40:20', '2019-01-27 19:41:27');
        
        INSERT INTO public.menus VALUES (3, 2, 'Inicio', 'home', 'home', 2, 1, '2019-01-27 19:41:48', '2019-01-27 19:41:48');
        INSERT INTO public.menus VALUES (4, 2, 'Seguridad', 'https', 'javascript:void(0);', 1, 3, '2019-01-27 19:42:07', '2019-01-27 19:42:07');
        INSERT INTO public.menus VALUES (5, 2, 'Configuración', 'settings', 'javascript:void(0);', 1, 4, '2019-01-27 19:50:47', '2019-01-27 19:50:47');
        INSERT INTO public.menus VALUES (6, 2, 'Personas', 'person', 'personas', 2, 3, '2019-01-27 19:49:14', '2019-01-27 19:49:14');
        INSERT INTO public.menus VALUES (7, 2, 'Buzón', 'email', 'mensaje', 2, 2, '2019-01-27 20:05:38', '2019-01-27 20:05:38');
        INSERT INTO public.menus VALUES (8, 2, 'Scaner', 'camera_alt', 'scaner', 2, 5, '2019-01-27 22:22:06', '2019-01-27 22:22:06');
        INSERT INTO public.menus VALUES (9, 2, 'Cargos', 'link', 'cargos', 2, 2, '2019-01-27 19:46:52', '2019-01-27 19:51:13');
        INSERT INTO public.menus VALUES (10, 2, 'Tipos de empleados', 'link', 'empleados_tipos', 2, 2, '2019-01-27 19:46:52', '2019-01-27 19:51:13');
        INSERT INTO public.menus VALUES (11, 2, 'Causas', 'link', 'causas', 2, 2, '2019-01-27 19:46:52', '2019-01-27 19:51:13');       
        
        INSERT INTO public.menus VALUES (12, 4, 'Permisos', 'link', 'permisos', 2, 1, '2019-01-27 19:43:26', '2019-01-27 19:43:26');
        INSERT INTO public.menus VALUES (13, 4, 'Nombre roles', 'link', 'nombreroles', 2, 4, '2019-01-27 19:44:10', '2019-01-27 19:44:10');
        INSERT INTO public.menus VALUES (14, 4, 'Roles', 'link', 'roles', 2, 5, '2019-01-27 19:44:39', '2019-01-27 19:44:39');
        INSERT INTO public.menus VALUES (15, 4, 'Usuarios', 'person_pin', 'usuarios', 2, 6, '2019-01-27 19:49:37', '2019-01-27 19:53:57');
        INSERT INTO public.menus VALUES (16, 4, 'Tipo menus', 'link', 'tipomenus', 2, 2, '2019-01-27 19:42:40', '2019-01-27 19:42:40');
        INSERT INTO public.menus VALUES (17, 4, 'Menu', 'link', 'menus', 2, 3, '2019-01-27 19:43:00', '2019-01-27 19:43:00');
        
        INSERT INTO public.menus VALUES (18, 5, 'Compañias', 'link', 'companias', 2, 1, '2019-01-27 19:46:26', '2019-01-27 19:51:07');
        INSERT INTO public.menus VALUES (19, 5, 'Sedes', 'link', 'sedes', 2, 2, '2019-01-27 19:46:52', '2019-01-27 19:51:13');

        ALTER SEQUENCE menus_id_seq RESTART WITH 20;
                     
        ");





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
