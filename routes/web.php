<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'InicioController@index')->name('inicio');
Route::get('seguridad/login', 'Security\LoginController@index')->name('login');
Route::post('seguridad/login', 'Security\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Security\LoginController@logout')->name('logout');
//Route::get('admin/permiso','Admin\PermissionsController@index')->name('permiso');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'mdsuperadmin']], function () {
//Route::group(['prefix'=>'admin','namespace' => 'Admin', 'middleware' => 'auth'], function() {
    // rutas de logueo
    Route::get('', 'AdminController@index');

    // Rutas de los controladores dentro del Namespace "App\Http\Controllers\Admin"
    Route::get('permiso', 'PermissionsController@index')->name('permiso');
    Route::get('permiso/crear', 'PermissionsController@create')->name('crear');
    Route::get('permiso/editar', 'PermissionsController@edit')->name('editar');
    Route::get('permiso/formulario', 'PermissionsController@form')->name('formlario');
     /*MENUS*/
    Route::get('menu', 'MenusController@index')->name('menu');
    Route::get('menu/crear', 'MenusController@create')->name('crear_menu');
    Route::post('menu', 'MenusController@store')->name('guardar_menu');
    Route::get('menu/formulario', 'MenusController@form')->name('formlario');
    //mas rutas crud editar menu
    Route::get('menu/{id}/editar', 'MenusController@edit')->name('editar_menu');
    Route::put('menu/{id}', 'MenusController@update')->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', 'MenusController@destroy')->name('eliminar_menu');
    //mas Ordem menu
    Route::post('menu/guardar-orden', 'MenusController@saveOrden')->name('guardar_orden');
     /*RUTAS ROL*/
    Route::get('rol', 'RolesController@index')->name('rol');
    Route::get('rol/crear', 'RolesController@create')->name('crear_rol');
    Route::post('rol', 'RolesController@store')->name('guardar_rol');
    Route::get('rol/{id}/editar', 'RolesController@edit')->name('editar_rol');
    Route::put('rol/{id}', 'RolesController@update')->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolesController@destroy')->name('eliminar_rol');
        /*RUTAS MENU_ROL*/
    Route::get('menu-rol', 'MenusRolesController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenusRolesController@store')->name('guardar_menu_rol');

});

