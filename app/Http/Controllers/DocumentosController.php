<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
//use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ValidacionDocumento;
use Illuminate\Support\Facades\Storage;
class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(cache()->tags('Permiso')->get('Permiso.rolid.2'));
        //cache::tags(['Permiso'])->flush();
        //cache()->tags('Permiso')->flush();
        //dd(cache()->tags('Permiso')->get('Permiso.rolid.2'));
        can('listar-documento');
        $datas = Documento::orderBy('id')->get();
        return view('documento.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(cache()->tags('Permiso')->get('Permiso.rolid.2'));
        can('crear-documento');
        return view('documento.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionDocumento $request)
    {
        //dd($request->all());
        //$documento = Documento::create($request->all());
        if ($foto = Documento::setCaratula($request->foto_up))
           $request->request->add(['foto' => $foto]);
        //dd($request->all());
        Documento::create($request->all());
         return redirect('documento')->with('mensaje', 'documento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //dd($documento);
        return view('documento.ver', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Documento::findOrFail($id);
        return view('documento.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionDocumento $request, $id)
    {
          $documento = Documento::findOrFail($id);
          //dd($documento->foto);
        if ($foto = Documento::setCaratula($request->foto_up, $documento->foto))
            $request->request->add(['foto' => $foto]);
        $documento->update($request->all());
        return redirect()->route('documento')->with('mensaje', 'El documento se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $documento = Documento::findOrFail($id);
            if (Documento::destroy($id)) {
                Storage::disk('public')->delete("imagenes/caratulas/$documento->foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
