<?php
Auth::routes();

Route::get('/', function () { return redirect('/login'); });
Route::get('/home', 'HomeController@index')->name('home');

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

Route::resource('mensaje', 'MensajeController');
