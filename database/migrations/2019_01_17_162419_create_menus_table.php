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
        INSERT INTO public.menus VALUES (4, 2, 'Modulo Seguridad', 'https', 'javascript:void(0);', 1, 24, '2019-01-27 19:42:07', '2019-01-31 14:29:41');
        INSERT INTO public.menus VALUES (5, 2, 'Modulo Parametros', 'settings', 'javascript:void(0);', 1, 6, '2019-01-27 19:50:47', '2019-01-31 14:29:27');
        INSERT INTO public.menus VALUES (6, 2, 'Modulo Empleados', 'face', 'javascript:void(0);', 1, 6, '2019-01-30 01:02:33', '2019-01-30 01:12:59');
        INSERT INTO public.menus VALUES (7, 2, 'Personas', 'person', 'personas', 2, 3, '2019-01-27 19:49:14', '2019-01-27 19:49:14');
        INSERT INTO public.menus VALUES (8, 2, 'Buzón', 'email', 'mensaje', 2, 2, '2019-01-27 20:05:38', '2019-01-27 20:05:38');
        INSERT INTO public.menus VALUES (9, 2, 'Scaner', 'camera_alt', 'scaner', 2, 31, '2019-01-27 22:22:06', '2019-01-27 22:22:06');
        INSERT INTO public.menus VALUES (10, 2, 'Usuarios', 'person_pin', 'usuarios', 2, 4, '2019-01-27 19:49:37', '2019-01-30 01:17:01');
        INSERT INTO public.menus VALUES (12, 4, 'Permisos', 'link', 'permisos', 2, 1, '2019-01-27 19:43:26', '2019-01-27 19:43:26');
        INSERT INTO public.menus VALUES (13, 4, 'Nombre roles', 'link', 'nombreroles', 2, 4, '2019-01-27 19:44:10', '2019-01-27 19:44:10');
        INSERT INTO public.menus VALUES (14, 4, 'Roles', 'link', 'roles', 2, 5, '2019-01-27 19:44:39', '2019-01-27 19:44:39');
        INSERT INTO public.menus VALUES (15, 4, 'Tipo menus', 'link', 'tipomenus', 2, 2, '2019-01-27 19:42:40', '2019-01-27 19:42:40');
        INSERT INTO public.menus VALUES (16, 4, 'Menu', 'link', 'menus', 2, 11, '2019-01-27 19:43:00', '2019-01-27 19:43:00');
        INSERT INTO public.menus VALUES (17, 5, 'Compañias', 'link', 'companias', 2, 1, '2019-01-27 19:46:26', '2019-01-27 19:51:07');
        INSERT INTO public.menus VALUES (18, 5, 'Sedes', 'link', 'sedes', 2, 2, '2019-01-27 19:46:52', '2019-01-27 19:51:13');
        INSERT INTO public.menus VALUES (19, 6, 'Cargos', 'link', 'cargos', 2, 8, '2019-01-27 19:46:52', '2019-01-30 01:03:35');
        INSERT INTO public.menus VALUES (20, 6, 'Tipos de empleados', 'link', 'empleados_tipos', 2, 0, '2019-01-27 19:46:52', '2019-01-30 01:03:54');
        INSERT INTO public.menus VALUES (21, 6, 'Causas', 'link', 'causas', 2, 3, '2019-01-27 19:46:52', '2019-01-30 01:03:25');
        INSERT INTO public.menus VALUES (22, 6, 'Estado Empleado', 'link', 'empleado_estados', 2, 3, '2019-01-30 01:05:50', '2019-01-30 01:05:50');
        INSERT INTO public.menus VALUES (23, 6, 'Empleados', 'link', 'empleados', 2, 16, '2019-01-30 01:06:20', '2019-01-30 01:06:20');
        INSERT INTO public.menus VALUES (24, 2, 'Modulo Proyectos', 'domain', 'javascript:void(0);', 1, 6, '2019-01-31 14:20:35', '2019-01-31 14:20:35');
        INSERT INTO public.menus VALUES (25, 24, 'Estados', 'link', 'estado_proyecto', 2, 0, '2019-01-31 14:21:06', '2019-01-31 14:21:06');
        INSERT INTO public.menus VALUES (26, 24, 'Proyectos', 'link', 'proyecto', 2, 1, '2019-01-31 14:21:26', '2019-01-31 14:21:26');
        INSERT INTO public.menus VALUES (27, 6, 'Direciones/Areas', 'link', 'direciones_areas', 2, 0, '2019-01-31 14:25:53', '2019-01-31 14:25:53');
        INSERT INTO public.menus VALUES (28, 2, 'Modulo Compromisos', 'group', 'javascript:void(0);', 1, 10, '2019-01-31 16:32:26', '2019-01-31 16:34:03');
        INSERT INTO public.menus VALUES (29, 28, 'Estado', 'link', 'estado_compromiso', 2, 1, '2019-01-31 16:33:36', '2019-01-31 16:33:36');
        INSERT INTO public.menus VALUES (30, 28, 'Compromisos', 'link', 'compromisos_maestros', 2, 2, '2019-01-30 01:11:29', '2019-01-31 16:33:59');
        INSERT INTO public.menus VALUES (31, 2, 'Modulo Tareas', 'notifications', 'javascript:void(0)', 1, 10, '2019-02-13 03:33:33', '2019-02-13 05:32:11');
        INSERT INTO public.menus VALUES (32, 31, 'Tipo', 'link', 'tipo_tarea', 2, 0, '2019-02-13 03:33:57', '2019-02-13 03:33:57');
        INSERT INTO public.menus VALUES (33, 31, 'Estado', 'link', 'tarea_estado', 2, 1, '2019-02-13 03:34:18', '2019-02-13 03:34:18');



        ALTER SEQUENCE menus_id_seq RESTART WITH 34;

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
