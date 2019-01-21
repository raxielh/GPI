<?php
Auth::routes();

Route::get('/', function () { return redirect('/login'); });
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/cambiar_tema', 'HomeController@cambiar_tema')->name('cambiar_tema');

Route::resource('usuarios', 'UsuariosController');
Route::get('/listado_usuarios', 'UsuariosController@listado')->name('listado_usuarios');

Route::resource('personas', 'PersonasController');
Route::get('/listado_personas', 'PersonasController@listado')->name('listado_personas');

Route::resource('rolesmaestros', 'RolesMaestrosController');
Route::get('/listado_rolesmaestros', 'RolesMaestrosController@listado')->name('listado_rolesmaestros');

Route::resource('companias', 'CompaniaController');
Route::get('/listado_companias', 'CompaniaController@listado')->name('listado_companias');