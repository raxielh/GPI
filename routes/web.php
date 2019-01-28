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

Route::resource('menus', 'MenusController');
Route::get('/dibujar_menu_g', 'MenusController@dibujar_menu_g')->name('dibujar_menu_g');
Route::get('/up/{id}/menus', 'MenusController@up')->name('menu.up');
Route::get('/down/{id}/menus', 'MenusController@down')->name('menu.down');
Route::get('/listado_menus', 'MenusController@listado')->name('listado_menus');

Route::resource('tipomenus', 'TipomenusController');
Route::get('/listado_tipomenus', 'TipomenusController@listado')->name('listado_tipomenus');

Route::resource('mensaje', 'MensajeController');

Route::get('/scaner', 'ScanerController@scaner')->name('scaner');
