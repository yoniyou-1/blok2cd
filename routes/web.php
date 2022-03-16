<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Security\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\MenusRolesController;
use App\Http\Controllers\Admin\PermissionsRolesController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\TipodocsController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\QuestionsTipodocsController;
use App\Http\Controllers\Admin\TiposolicitudesController;
use App\Http\Controllers\Admin\TipoestadosController;
use App\Http\Controllers\Admin\TipoestadosTipodocsController;
use App\Http\Controllers\Admin\TipofechasController;
use App\Http\Controllers\Admin\TipofechasTipodocsController;
use App\Http\Controllers\Admin\RefexternasController;
use App\Http\Controllers\Admin\RefexternasTipodocsController;
use App\Http\Controllers\DocumentosController;


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

Route::get('/', [InicioController::class, 'index'])->middleware('auth')->name('inicio');
Route::get('seguridad/login', [LoginController::class, 'index'])->name('login');
Route::post('seguridad/login', [LoginController::class, 'login'])->name('login_post');
Route::get('seguridad/logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('admin/permiso','Admin\PermissionsController@index')->name('permiso');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'mdsuperadmin']], function () {
//Route::group(['prefix'=>'admin','namespace' => 'Admin', 'middleware' => 'auth'], function() {
    // rutas de logueo
    Route::get('', [AdminController::class, 'index']);

    // Rutas de los controladores dentro del Namespace "App\Http\Controllers\Admin"
    Route::get('permiso', [PermissionsController::class, 'index'])->name('permiso');
    Route::get('permiso/crear', [PermissionsController::class, 'create'])->name('crear_permiso');

    Route::post('permiso', [PermissionsController::class, 'store'])->name('guardar_permiso');

    Route::get('permiso/{id}/editar', [PermissionsController::class, 'edit'])->name('editar_permiso');

    Route::put('permiso/{id}', [PermissionsController::class, 'update'])->name('actualizar_permiso');
    Route::delete('permiso/{id}', [PermissionsController::class, 'destroy'])->name('eliminar_permiso');

    //Route::get('permiso/formulario', 'PermissionsController@form')->name('formlario_permiso');
     /*MENUS*/
    Route::get('menu', [MenusController::class, 'index'])->name('menu');
    Route::get('menu/crear', [MenusController::class, 'create'])->name('crear_menu');
    Route::post('menu', [MenusController::class, 'store'])->name('guardar_menu');
    Route::get('menu/formulario', [MenusController::class, 'form'])->name('formlario');
    //mas rutas crud editar menu
    Route::get('menu/{id}/editar', [MenusController::class, 'edit'])->name('editar_menu');
    Route::put('menu/{id}', [MenusController::class, 'update'])->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', [MenusController::class, 'destroy'])->name('eliminar_menu');
    //mas Ordem menu
    Route::post('menu/guardar-orden', [MenusController::class, 'saveOrden'])->name('guardar_orden');
     /*RUTAS ROL*/
    Route::get('rol', [RolesController::class, 'index'])->name('rol');
    Route::get('rol/crear', [RolesController::class, 'create'])->name('crear_rol');
    Route::post('rol', [RolesController::class, 'store'])->name('guardar_rol');
    Route::get('rol/{id}/editar', [RolesController::class, 'edit'])->name('editar_rol');
    Route::put('rol/{id}', [RolesController::class, 'update'])->name('actualizar_rol');
    Route::delete('rol/{id}', [RolesController::class, 'destroy'])->name('eliminar_rol');
        /*RUTAS MENU_ROL*/
    Route::get('menu-rol', [MenusRolesController::class, 'index'])->name('menu_rol');
    Route::post('menu-rol', [MenusRolesController::class, 'store'])->name('guardar_menu_rol');
        /*RUTAS PERMISO_ROL*/
    Route::get('permiso-rol', [PermissionsRolesController::class, 'index'])->name('permiso_rol');
    Route::post('permiso-rol', [PermissionsRolesController::class, 'store'])->name('guardar_permiso_rol');
    /*RUTAS DE USUARIO*/
    Route::get('usuario', [UsuarioController::class, 'index'])->name('usuario');
    Route::get('usuario/crear', [UsuarioController::class, 'create'])->name('crear_usuario');
    Route::post('usuario', [UsuarioController::class, 'store'])->name('guardar_usuario');
    Route::get('usuario/{id}/editar', [UsuarioController::class, 'edit'])->name('editar_usuario');
    Route::put('usuario/{id}', [UsuarioController::class, 'update'])->name('actualizar_usuario');
    Route::delete('usuario/{id}', [UsuarioController::class, 'destroy'])->name('eliminar_usuario');
     /*RUTAS TIPODOCUMENTOS*/
    Route::get('tipodoc', [TipodocsController::class, 'index'])->name('tipodoc');
    Route::get('tipodoc/crear', [TipodocsController::class, 'create'])->name('crear_tipodoc');
    Route::post('tipodoc', [TipodocsController::class, 'store'])->name('guardar_tipodoc');
    Route::get('tipodoc/{id}/editar', [TipodocsController::class, 'edit'])->name('editar_tipodoc');
    Route::put('tipodoc/{id}', [TipodocsController::class, 'update'])->name('actualizar_tipodoc');
    Route::delete('tipodoc/{id}', [TipodocsController::class, 'destroy'])->name('eliminar_tipodoc');

     /*RUTAS PREGUNTAS */
    Route::get('pregunta', [QuestionsController::class, 'index'])->name('pregunta');
    Route::get('pregunta/crear', [QuestionsController::class, 'create'])->name('crear_pregunta');
    Route::post('pregunta', [QuestionsController::class, 'store'])->name('guardar_pregunta');
    Route::get('pregunta/{id}/editar', [QuestionsController::class, 'edit'])->name('editar_pregunta');
    Route::put('pregunta/{id}', [QuestionsController::class, 'update'])->name('actualizar_pregunta');
    Route::delete('pregunta/{id}', [QuestionsController::class, 'destroy'])->name('eliminar_pregunta');
            /*RUTAS PREGUNTA _ TIPO DE DOCUMENTO*/
    Route::get('pregunta-tipodoc', [QuestionsTipodocsController::class, 'index'])->name('pregunta_tipodoc');
    Route::post('pregunta-tipodoc', [QuestionsTipodocsController::class, 'store'])->name('guardar_pregunta_tipodoc');

    /*RUTAS TIPO DE SOLICITUD para los Documentos*/
    Route::get('tiposolicitud', [TiposolicitudesController::class, 'index'])->name('tiposolicitud');
    Route::get('tiposolicitud/crear', [TiposolicitudesController::class, 'create'])->name('crear_tiposolicitud');
    Route::post('tiposolicitud', [TiposolicitudesController::class, 'store'])->name('guardar_tiposolicitud');
    Route::get('tiposolicitud/{id}/editar', [TiposolicitudesController::class, 'edit'])->name('editar_tiposolicitud');
    Route::put('tiposolicitud/{id}', [TiposolicitudesController::class, 'update'])->name('actualizar_tiposolicitud');
    Route::delete('tiposolicitud/{id}', [TiposolicitudesController::class, 'destroy'])->name('eliminar_tiposolicitud');

    /*RUTAS TIPO DE Estado para los Documentos*/
    Route::get('tipoestado', [TipoestadosController::class, 'index'])->name('tipoestado');
    Route::get('tipoestado/crear', [TipoestadosController::class, 'create'])->name('crear_tipoestado');
    Route::post('tipoestado', [TipoestadosController::class, 'store'])->name('guardar_tipoestado');
    Route::get('tipoestado/{id}/editar', [TipoestadosController::class, 'edit'])->name('editar_tipoestado');
    Route::put('tipoestado/{id}', [TipoestadosController::class, 'update'])->name('actualizar_tipoestado');
    Route::delete('tipoestado/{id}', [TipoestadosController::class, 'destroy'])->name('eliminar_tipoestado');
            /*RUTAS TIPO DE Estado para los Documentos _ TIPO DE DOCUMENTO*/
    Route::get('tipoestado-tipodoc', [TipoestadosTipodocsController::class, 'index'])->name('tipoestado_tipodoc');
    Route::post('tipoestado-tipodoc', [TipoestadosTipodocsController::class, 'store'])->name('guardar_tipoestado_tipodoc');

    /*RUTAS DE TIPO de Fecha para Los Documentos*/
    Route::get('tipofecha', [TipofechasController::class, 'index'])->name('tipofecha');
    Route::get('tipofecha/crear', [TipofechasController::class, 'create'])->name('crear_tipofecha');
    Route::post('tipofecha', [TipofechasController::class, 'store'])->name('guardar_tipofecha');
    Route::get('tipofecha/{id}/editar', [TipofechasController::class, 'edit'])->name('editar_tipofecha');
    Route::put('tipofecha/{id}', 'TipofechasController@update')->name('actualizar_tipofecha');
    Route::delete('tipofecha/{id}', [TipofechasController::class, 'destroy'])->name('eliminar_tipofecha');
            /*RUTAS TIPO DE Fecha para los Documentos _ TIPO DE DOCUMENTO*/
    Route::get('tipofecha-tipodoc', [TipofechasTipodocsController::class, 'index'])->name('tipofecha_tipodoc');
    Route::post('tipofecha-tipodoc', [TipofechasTipodocsController::class, 'store'])->name('guardar_tipofecha_tipodoc');

    /*RUTAS TIPO DE Estado para los Documentos*/
    Route::get('refexterna', [RefexternasController::class, 'index'])->name('refexterna');
    Route::get('refexterna/crear', [RefexternasController::class, 'create'])->name('crear_refexterna');
    Route::post('refexterna', [RefexternasController::class, 'store'])->name('guardar_refexterna');
    Route::get('refexterna/{id}/editar', [RefexternasController::class, 'edit'])->name('editar_refexterna');
    Route::put('refexterna/{id}', [RefexternasController::class, 'update'])->name('actualizar_refexterna');
    Route::delete('refexterna/{id}', [RefexternasController::class, 'destroy'])->name('eliminar_refexterna');
            /*RUTAS TIPO DE Estado para los Documentos _ TIPO DE DOCUMENTO.*/
    Route::get('refexterna-tipodoc', [RefexternasTipodocsController::class, 'index'])->name('refexterna_tipodoc');
    Route::post('refexterna-tipodoc', [RefexternasTipodocsController::class, 'store'])->name('guardar_refexterna_tipodoc');

});

 /*RUTAS Documentos*/
    Route::get('documento', [DocumentosController::class, 'index'])->middleware('auth')->name('documento');
    Route::get('documento/crear', [DocumentosController::class, 'create'])->middleware('auth')->name('crear_documento');
    /*exporte en excel de Documentos index*/
    Route::get('documento/documento-excel', [DocumentosController::class, 'DocumentosExportListExcel'])->middleware('auth')->name('excel_documento');
    Route::get('documento/documento-index-excel', [DocumentosController::class, 'DocumentosExportIndex'])->middleware('auth')->name('documento_index_excel');
    Route::get('documento/{id}/documento-ver-excel0', [DocumentosController::class, 'DocumentosExportVer0'])->middleware('auth')->name('documento_ver_excel0');
    Route::get('documento/{id}/documento-ver-excel2', [DocumentosController::class, 'DocumentosExportVer2'])->middleware('auth')->name('documento_ver_excel2');
    Route::get('documento/{id}/documento-ver-excel', [DocumentosController::class, 'DocumentosExportVer'])->middleware('auth')->name('documento_ver_excel');
    /*exporte en pdf de Documentos ver*/
    /*Route::get('documento/{id}/documento-ver-pdf', 'DocumentosController@DocumentosExportVerpdf')->middleware('auth')->name('documento_ver_pdf');*/
    /*exportespdf en pdf de Documentos ver pdf*/
    /*Route::get('documento/{id}/documento-ver-pdf', 'DocumentosController@DocumentosExportVerpdf')->middleware('auth')->name('documento_ver_pdf');*/
    Route::get('documento/{id}/documento-ver-pdf', [DocumentosController::class, 'DocumentosExportVerpdf'])->middleware('auth')->name('documento_ver_pdf');



    //viejo Route::get('documento/{id}/editar', 'DocumentosController@edit')->middleware('auth')->name('editar_documento');
    /*AJAX preguntas-tipo de documentos en: el documento*/
    Route::post('documento/crear', [DocumentosController::class, 'createpreguntadocajax'])->middleware('auth')->name('pregunta_documento');
    /*AJAX2 tipoestados-tipo de documentos en: el documento*/
    Route::post('documento/crear2', [DocumentosController::class, 'createpreguntadocajax2'])->middleware('auth')->name('pregunta_documento2');

    /*AJAX3 tipofechas-tipo de documentos en: el documento*/
    Route::post('documento/crear3', [DocumentosController::class, 'createtipofechaajax3'])->middleware('auth')->name('tipofecha_documento3');

    /*AJAX4 identificador-tipo de documentos en: el documento verificar existencia*/
    Route::post('documento/crear4', [DocumentosController::class, 'createexiteidentificadorajax4'])->middleware('auth')->name('exiteidentificador_documento4');
    
    /*AJAX2 tipoestados-tipo de documentos en: el documento*/
    Route::post('documento/crear5', [DocumentosController::class, 'createrefexternadocajax5'])->middleware('auth')->name('refexterna_documento5');

    Route::post('documento', [DocumentosController::class, 'store'])->middleware('auth')->name('guardar_documento');
    Route::post('documento/{documento}', [DocumentosController::class, 'show'])->middleware('auth')->name('ver_documento');
    Route::get('documento/{id}/editar', [DocumentosController::class, 'edit'])->middleware('auth')->name('editar_documento');
    Route::put('documento/{id}', [DocumentosController::class, 'update'])->middleware('auth')->name('actualizar_documento');
    Route::delete('documento/{id}', [DocumentosController::class, 'destroy'])->middleware('auth')->name('eliminar_documento');
    Route::delete('file/delete', [DocumentosController::class, 'destroyfile'])->middleware('auth')->name('eliminar_file');