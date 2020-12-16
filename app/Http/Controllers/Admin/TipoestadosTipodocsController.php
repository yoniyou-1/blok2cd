<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tipoestado;
use App\Models\Admin\Tipodoc;
class TipoestadosTipodocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipodocs = Tipodoc::orderBy('id')->pluck('name', 'id')->toArray();
        $tipoestados = Tipoestado::get();
        $tipoestadostipodocs = Tipoestado::with('tipodocs')->get()->pluck('tipodocs', 'id')->toArray();
        return view('admin.tipoestado-tipodoc.index', compact('tipodocs', 'tipoestados', 'tipoestadostipodocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $tipoestados = new Tipoestado();
            if ($request->input('estado') == 1) {
                $tipoestados->find($request->input('tipoestado_id'))->tipodocs()->attach($request->input('tipodoc_id'));
                return response()->json(['respuesta' => 'El Estado se asigno correctamente al tipo de Documento']);
            } else {
                $tipoestados->find($request->input('tipoestado_id'))->tipodocs()->detach($request->input('tipodoc_id'));
                return response()->json(['respuesta' => 'La pregunta se retiro correctamente al tipo de Documento']);
            }
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
