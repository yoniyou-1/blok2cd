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
Route::get('/','inicioController@index');
//Route::get('admin/permiso','Admin\PermissionsController@index')->name('permiso');

Route::group(['prefix'=>'admin','namespace' => 'Admin'], function() {
    // Rutas de los controladores dentro del Namespace "App\Http\Controllers\Admin"
    Route::get('permiso', 'PermissionsController@index')->name('permiso');
    Route::get('permiso/crear', 'PermissionsController@create')->name('crear');
    Route::get('permiso/editar', 'PermissionsController@edit')->name('editar');
    Route::get('permiso/formulario', 'PermissionsController@form')->name('formlario');

});