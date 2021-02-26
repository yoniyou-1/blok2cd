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

Route::get('/', 'InicioController@index')->middleware('auth')->name('inicio');
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
    Route::get('permiso/crear', 'PermissionsController@create')->name('crear_permiso');

    Route::post('permiso', 'PermissionsController@store')->name('guardar_permiso');

    Route::get('permiso/{id}/editar', 'PermissionsController@edit')->name('editar_permiso');

    Route::put('permiso/{id}', 'PermissionsController@update')->name('actualizar_permiso');
    Route::delete('permiso/{id}', 'PermissionsController@destroy')->name('eliminar_permiso');

    //Route::get('permiso/formulario', 'PermissionsController@form')->name('formlario_permiso');
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
        /*RUTAS PERMISO_ROL*/
    Route::get('permiso-rol', 'PermissionsRolesController@index')->name('permiso_rol');
    Route::post('permiso-rol', 'PermissionsRolesController@store')->name('guardar_permiso_rol');
    /*RUTAS DE USUARIO*/
    Route::get('usuario', 'UsuarioController@index')->name('usuario');
    Route::get('usuario/crear', 'UsuarioController@create')->name('crear_usuario');
    Route::post('usuario', 'UsuarioController@store')->name('guardar_usuario');
    Route::get('usuario/{id}/editar', 'UsuarioController@edit')->name('editar_usuario');
    Route::put('usuario/{id}', 'UsuarioController@update')->name('actualizar_usuario');
    Route::delete('usuario/{id}', 'UsuarioController@destroy')->name('eliminar_usuario');
     /*RUTAS TIPODOCUMENTOS*/
    Route::get('tipodoc', 'TipodocsController@index')->name('tipodoc');
    Route::get('tipodoc/crear', 'TipodocsController@create')->name('crear_tipodoc');
    Route::post('tipodoc', 'TipodocsController@store')->name('guardar_tipodoc');
    Route::get('tipodoc/{id}/editar', 'TipodocsController@edit')->name('editar_tipodoc');
    Route::put('tipodoc/{id}', 'TipodocsController@update')->name('actualizar_tipodoc');
    Route::delete('tipodoc/{id}', 'TipodocsController@destroy')->name('eliminar_tipodoc');

     /*RUTAS PREGUNTAS */
    Route::get('pregunta', 'QuestionsController@index')->name('pregunta');
    Route::get('pregunta/crear', 'QuestionsController@create')->name('crear_pregunta');
    Route::post('pregunta', 'QuestionsController@store')->name('guardar_pregunta');
    Route::get('pregunta/{id}/editar', 'QuestionsController@edit')->name('editar_pregunta');
    Route::put('pregunta/{id}', 'QuestionsController@update')->name('actualizar_pregunta');
    Route::delete('pregunta/{id}', 'QuestionsController@destroy')->name('eliminar_pregunta');
            /*RUTAS PREGUNTA _ TIPO DE DOCUMENTO*/
    Route::get('pregunta-tipodoc', 'QuestionsTipodocsController@index')->name('pregunta_tipodoc');
    Route::post('pregunta-tipodoc', 'QuestionsTipodocsController@store')->name('guardar_pregunta_tipodoc');

    /*RUTAS TIPO DE SOLICITUD para los Documentos*/
    Route::get('tiposolicitud', 'TiposolicitudesController@index')->name('tiposolicitud');
    Route::get('tiposolicitud/crear', 'TiposolicitudesController@create')->name('crear_tiposolicitud');
    Route::post('tiposolicitud', 'TiposolicitudesController@store')->name('guardar_tiposolicitud');
    Route::get('tiposolicitud/{id}/editar', 'TiposolicitudesController@edit')->name('editar_tiposolicitud');
    Route::put('tiposolicitud/{id}', 'TiposolicitudesController@update')->name('actualizar_tiposolicitud');
    Route::delete('tiposolicitud/{id}', 'TiposolicitudesController@destroy')->name('eliminar_tiposolicitud');

    /*RUTAS TIPO DE Estado para los Documentos*/
    Route::get('tipoestado', 'TipoestadosController@index')->name('tipoestado');
    Route::get('tipoestado/crear', 'TipoestadosController@create')->name('crear_tipoestado');
    Route::post('tipoestado', 'TipoestadosController@store')->name('guardar_tipoestado');
    Route::get('tipoestado/{id}/editar', 'TipoestadosController@edit')->name('editar_tipoestado');
    Route::put('tipoestado/{id}', 'TipoestadosController@update')->name('actualizar_tipoestado');
    Route::delete('tipoestado/{id}', 'TipoestadosController@destroy')->name('eliminar_tipoestado');
            /*RUTAS TIPO DE Estado para los Documentos _ TIPO DE DOCUMENTO*/
    Route::get('tipoestado-tipodoc', 'TipoestadosTipodocsController@index')->name('tipoestado_tipodoc');
    Route::post('tipoestado-tipodoc', 'TipoestadosTipodocsController@store')->name('guardar_tipoestado_tipodoc');

    /*RUTAS DE TIPO de Fecha para Los Documentos*/
    Route::get('tipofecha', 'TipofechasController@index')->name('tipofecha');
    Route::get('tipofecha/crear', 'TipofechasController@create')->name('crear_tipofecha');
    Route::post('tipofecha', 'TipofechasController@store')->name('guardar_tipofecha');
    Route::get('tipofecha/{id}/editar', 'TipofechasController@edit')->name('editar_tipofecha');
    Route::put('tipofecha/{id}', 'TipofechasController@update')->name('actualizar_tipofecha');
    Route::delete('tipofecha/{id}', 'TipofechasController@destroy')->name('eliminar_tipofecha');
            /*RUTAS TIPO DE Fecha para los Documentos _ TIPO DE DOCUMENTO*/
    Route::get('tipofecha-tipodoc', 'TipofechasTipodocsController@index')->name('tipofecha_tipodoc');
    Route::post('tipofecha-tipodoc', 'TipofechasTipodocsController@store')->name('guardar_tipofecha_tipodoc');

    /*RUTAS TIPO DE Estado para los Documentos*/
    Route::get('refexterna', 'RefexternasController@index')->name('refexterna');
    Route::get('refexterna/crear', 'RefexternasController@create')->name('crear_refexterna');
    Route::post('refexterna', 'RefexternasController@store')->name('guardar_refexterna');
    Route::get('refexterna/{id}/editar', 'RefexternasController@edit')->name('editar_refexterna');
    Route::put('refexterna/{id}', 'RefexternasController@update')->name('actualizar_refexterna');
    Route::delete('refexterna/{id}', 'RefexternasController@destroy')->name('eliminar_refexterna');
            /*RUTAS TIPO DE Estado para los Documentos _ TIPO DE DOCUMENTO.*/
    Route::get('refexterna-tipodoc', 'RefexternasTipodocsController@index')->name('refexterna_tipodoc');
    Route::post('refexterna-tipodoc', 'RefexternasTipodocsController@store')->name('guardar_refexterna_tipodoc');

});

 /*RUTAS Documentos*/
    Route::get('documento', 'DocumentosController@index')->middleware('auth')->name('documento');
    Route::get('documento/crear', 'DocumentosController@create')->middleware('auth')->name('crear_documento');
    /*AJAX preguntas-tipo de documentos en: el documento*/
    Route::post('documento/crear', 'DocumentosController@createpreguntadocajax')->middleware('auth')->name('pregunta_documento');
    /*AJAX2 tipoestados-tipo de documentos en: el documento*/
    Route::post('documento/crear2', 'DocumentosController@createpreguntadocajax2')->middleware('auth')->name('pregunta_documento2');

    /*AJAX3 tipofechas-tipo de documentos en: el documento*/
    Route::post('documento/crear3', 'DocumentosController@createtipofechaajax3')->middleware('auth')->name('tipofecha_documento3');

    /*AJAX4 identificador-tipo de documentos en: el documento verificar existencia*/
    Route::post('documento/crear4', 'DocumentosController@createexiteidentificadorajax4')->middleware('auth')->name('exiteidentificador_documento4');
    
    /*AJAX2 tipoestados-tipo de documentos en: el documento*/
    Route::post('documento/crear5', 'DocumentosController@createrefexternadocajax5')->middleware('auth')->name('refexterna_documento5');

    Route::post('documento', 'DocumentosController@store')->middleware('auth')->name('guardar_documento');
    Route::post('documento/{documento}', 'DocumentosController@show')->middleware('auth')->name('ver_documento');
    Route::get('documento/{id}/editar', 'DocumentosController@edit')->middleware('auth')->name('editar_documento');
    Route::put('documento/{id}', 'DocumentosController@update')->middleware('auth')->name('actualizar_documento');
    Route::delete('documento/{id}', 'DocumentosController@destroy')->middleware('auth')->name('eliminar_documento');
    Route::delete('file/delete', 'DocumentosController@destroyfile')->middleware('auth')->name('eliminar_file');