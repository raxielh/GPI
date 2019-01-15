<?php
Auth::routes();
Route::get('/', function () { return redirect('/login'); });
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/cambiar_tema', 'HomeController@cambiar_tema')->name('cambiar_tema');
Route::resource('usuarios', 'UsuariosController');
