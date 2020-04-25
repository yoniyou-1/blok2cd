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
//Route::get('admin/permiso','Admin\PermisoController@index')->name('permiso');

Route::group(['prefix'=>'admin','namespace' => 'Admin'], function() {
    // Rutas de los controladores dentro del Namespace "App\Http\Controllers\Admin"
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/create', 'PermisoController@create')->name('crear');
    Route::get('permiso/edit', 'PermisoController@edit')->name('editar');
    Route::get('permiso/form', 'PermisoController@form')->name('formlario');

});