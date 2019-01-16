<?php
Auth::routes();

Route::get('/', function () { return redirect('/login'); });
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/cambiar_tema', 'HomeController@cambiar_tema')->name('cambiar_tema');

Route::resource('usuarios', 'UsuariosController');
Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios')->name('listado_usuarios');

Route::resource('personas', 'PersonasController');
Route::get('/listado_personas', 'PersonasController@listado_personas')->name('listado_personas');
