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

        INSERT INTO public.menus (id, id_padre, descripcion, icono, ruta, tipomenu_id, orden, created_at, updated_at)
        VALUES
          (0, 0, '', NULL, '', 1, 0, NULL, NULL),
          (1, 0, '', NULL, '', 1, 0, NULL, NULL),
          (2, 1, 'App', 'desktop_mac', 'javascript:void(0);', 1, 0, '2019-01-27 19:40:20', '2019-01-27 19:41:27'),
          (3, 2, 'Inicio', 'home', 'home', 2, 1, '2019-01-27 19:41:48', '2019-01-27 19:41:48'),
          (4, 2, 'Modulo Seguridad', 'https', 'javascript:void(0);', 1, 24, '2019-01-27 19:42:07', '2019-01-31 14:29:41'),
          (5, 2, 'Modulo Parametros', 'settings', 'javascript:void(0);', 1, 6, '2019-01-27 19:50:47', '2019-01-31 14:29:27'),
          (6, 2, 'Modulo Empleados', 'face', 'javascript:void(0);', 1, 6, '2019-01-30 01:02:33', '2019-01-30 01:12:59'),
          (7, 2, 'Personas', 'person', 'personas', 2, 3, '2019-01-27 19:49:14', '2019-01-27 19:49:14'),
          (8, 2, 'Buzón', 'email', 'mensaje', 2, 2, '2019-01-27 20:05:38', '2019-01-27 20:05:38'),
          (9, 2, 'Scaner', 'camera_alt', 'scaner', 2, 31, '2019-01-27 22:22:06', '2019-01-27 22:22:06'),
          (10, 2, 'Usuarios', 'person_pin', 'usuarios', 2, 4, '2019-01-27 19:49:37', '2019-01-30 01:17:01'),
          (11, 2, 'Compromisos', 'group', 'compromisos_maestros', 2, 4, '2019-01-30 01:11:29', '2019-01-30 01:15:44'),
          (12, 4, 'Permisos', 'link', 'permisos', 2, 1, '2019-01-27 19:43:26', '2019-01-27 19:43:26'),
          (13, 4, 'Nombre roles', 'link', 'nombreroles', 2, 4, '2019-01-27 19:44:10', '2019-01-27 19:44:10'),
          (14, 4, 'Roles', 'link', 'roles', 2, 5, '2019-01-27 19:44:39', '2019-01-27 19:44:39'),
          (15, 4, 'Tipo menus', 'link', 'tipomenus', 2, 2, '2019-01-27 19:42:40', '2019-01-27 19:42:40'),
          (16, 4, 'Menu', 'link', 'menus', 2, 11, '2019-01-27 19:43:00', '2019-01-27 19:43:00'),
          (17, 5, 'Compañias', 'link', 'companias', 2, 1, '2019-01-27 19:46:26', '2019-01-27 19:51:07'),
          (18, 5, 'Sedes', 'link', 'sedes', 2, 2, '2019-01-27 19:46:52', '2019-01-27 19:51:13'),
          (19, 6, 'Cargos', 'link', 'cargos', 2, 8, '2019-01-27 19:46:52', '2019-01-30 01:03:35'),
          (20, 6, 'Tipos de empleados', 'link', 'empleados_tipos', 2, 0, '2019-01-27 19:46:52', '2019-01-30 01:03:54'),
          (21, 6, 'Causas', 'link', 'causas', 2, 3, '2019-01-27 19:46:52', '2019-01-30 01:03:25'),
          (22, 6, 'Estado Empleado', 'link', 'empleado_estados', 2, 3, '2019-01-30 01:05:50', '2019-01-30 01:05:50'),
          (23, 6, 'Empleados', 'link', 'empleados', 2, 16, '2019-01-30 01:06:20', '2019-01-30 01:06:20'),
          (24, 2, 'Modulo Proyectos', 'domain', 'javascript:void(0);', 1, 6, '2019-01-31 14:20:35', '2019-01-31 14:20:35'),
          (25, 24, 'Estados', 'link', 'estado_proyecto', 2, 0, '2019-01-31 14:21:06', '2019-01-31 14:21:06'),
          (26, 24, 'Proyectos', 'link', 'proyecto', 2, 1, '2019-01-31 14:21:26', '2019-01-31 14:21:26'),
          (27, 6, 'Direciones/Areas', 'link', 'direciones_areas', 2, 0, '2019-01-31 14:25:53', '2019-01-31 14:25:53');







        ALTER SEQUENCE menus_id_seq RESTART WITH 28;

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
