<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tipofecha;
use App\Models\Admin\Tipodoc;

class TipofechasTipodocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipodocs = Tipodoc::orderBy('id')->pluck('name', 'id')->toArray();
        $tipofechas = Tipofecha::get();
        $tipofechastipodocs = Tipofecha::with('tipodocs')->get()->pluck('tipodocs', 'id')->toArray();
        return view('admin.tipofecha-tipodoc.index', compact('tipodocs', 'tipofechas', 'tipofechastipodocs'));
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
            $tipofechas = new Tipofecha();
            if ($request->input('estado') == 1) {
                $tipofechas->find($request->input('tipofecha_id'))->tipodocs()->attach($request->input('tipodoc_id'));
                return response()->json(['respuesta' => 'La fecha se asigno correctamente al tipo de Documento']);
            } else {
                $tipofechas->find($request->input('tipofecha_id'))->tipodocs()->detach($request->input('tipodoc_id'));
                return response()->json(['respuesta' => 'La fecha se retiro correctamente al tipo de Documento']);
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
