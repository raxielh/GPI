<?php
Auth::routes();

Route::get('/', function () { return redirect('/login'); });
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tareasComromisos', 'HomeController@tareasComromisos')->name('tareasComromisos');
Route::get('/tareasComromisos/{id}/{p}/{c}', 'HomeController@cambiar_porcentaje')->name('cambiar_porcentaje');
Route::get('/tareasComromisos/{id}/{p}', 'HomeController@cambiar_porcentaje_tarea')->name('cambiar_porcentaje_tarea');

Route::post('/cambiar_tema', 'HomeController@cambiar_tema')->name('cambiar_tema');

Route::resource('usuarios', 'UsuariosController');
Route::get('/listado_usuarios', 'UsuariosController@listado')->name('listado_usuarios');

Route::resource('personas', 'PersonasController');
Route::get('/listado_personas', 'PersonasController@listado')->name('listado_personas');

Route::resource('nombreroles', 'RolesMaestrosController');
Route::get('/listado_nombreroles', 'RolesMaestrosController@listado')->name('listado_nombreroles');

Route::resource('companias', 'CompaniaController');
Route::get('/listado_companias', 'CompaniaController@listado')->name('listado_companias');

Route::resource('sedes', 'SedesController');
Route::get('/listado_sedes', 'SedesController@listado')->name('listado_sedes');

Route::resource('permisos', 'PermisosController');
Route::get('/listado_permisos', 'PermisosController@listado')->name('listado_permisos');

Route::resource('roles', 'RolesController');
Route::get('/listado_roles', 'RolesController@listado')->name('listado_roles');

Route::resource('menus', 'MenusController');
Route::get('/dibujar_menu_g', 'MenusController@dibujar_menu_g')->name('dibujar_menu_g');
Route::get('/up/{id}/menus', 'MenusController@up')->name('menu.up');
Route::get('/down/{id}/menus', 'MenusController@down')->name('menu.down');
Route::get('/listado_menus', 'MenusController@listado')->name('listado_menus');

Route::resource('tipomenus', 'TipomenusController');
Route::get('/listado_tipomenus', 'TipomenusController@listado')->name('listado_tipomenus');

Route::resource('mensaje', 'MensajeController');

Route::get('/scaner', 'ScanerController@scaner')->name('scaner');

Route::resource('cargos', 'CargosController');
Route::get('/listado_cargos', 'CargosController@listado')->name('listado_cargos');

Route::resource('causas', 'CausasController');
Route::get('/listado_causas', 'CausasController@listado')->name('listado_causas');

Route::resource('empleados_tipos', 'Empleados_tiposController');
Route::get('/listado_empleados_tipos', 'Empleados_tiposController@listado')->name('listado_empleados_tipos');

Route::resource('empleado_estados', 'Empleado_estadosController');
Route::get('/listado_empleado_estados', 'Empleado_estadosController@listado')->name('listado_empleado_estados');

Route::resource('empleados', 'EmpleadosController');
Route::get('/listado_empleados', 'EmpleadosController@listado')->name('listado_empleados');

Route::resource('compromisos_maestros', 'Compromisos_maestrosController');
Route::get('/listado_compromisos_maestros', 'Compromisos_maestrosController@listado')->name('listado_compromisos_maestros');
Route::get('/compromisos_maestros/detalle/{id}', 'Compromisos_maestrosController@detalle')->name('compromisos_maestros_detalle');
Route::get('/compromisos_maestros/vinculados/{id}', 'Compromisos_maestrosController@vinculados')->name('compromisos_maestros.vinculados');

Route::resource('estado_proyecto', 'Estado_proyectoController');
Route::get('/listado_estado_proyecto', 'Estado_proyectoController@listado')->name('listado_estado_proyecto');

Route::resource('actividades_tipo', 'Actividades_tipoController');
Route::get('/listado_actividades_tipo', 'Actividades_tipoController@listado')->name('listado_actividades_tipo');

Route::resource('direciones_areas', 'direciones_areasController');
Route::get('/listado_direciones_areas', 'direciones_areasController@listado')->name('listado_direciones_areas');

Route::resource('registro_lluvia', 'registro_lluviaController');
Route::get('/listado_registro_lluvia', 'registro_lluviaController@listado')->name('listado_registro_lluvia');

Route::resource('compromisos_integrantes', 'Compromisos_integrantesController');
Route::get('/listado_compromisos_integrantes', 'Compromisos_integrantesController@listado')->name('listado_compromisos_integrantes');

Route::resource('proyecto', 'ProyectosController');
Route::get('/listado_proyecto', 'ProyectosController@listado')->name('listado_proyecto');

Route::resource('compromisos', 'CompromisosController');
Route::get('/listado_compromisos', 'CompromisosController@listado')->name('listado_compromisos');
Route::get('/compromisos/detalle/{id}', 'CompromisosController@ver_detalle')->name('ver_detalle');

Route::resource('estado_compromiso', 'Estado_compromisosController');
Route::get('/listado_estado_compromiso', 'Estado_compromisosController@listado')->name('listado_estado_compromiso');

Route::get('/reporte', 'ReportesController@index')->name('reportes');

Route::resource('tipo_tarea', 'TipoTareasController');
Route::get('/listado_tipo_tarea', 'TipoTareasController@listado')->name('listado_tipo_tarea');

Route::resource('tarea_estado', 'TareaEstadoController');
Route::get('/listado_tarea_estado', 'TareaEstadoController@listado')->name('listado_tarea_estado');

Route::resource('compromiso_tarea', 'CompromisoTareaController');
Route::get('/listado_compromiso_tarea', 'CompromisoTareaController@listado')->name('listado_compromiso_tarea');

