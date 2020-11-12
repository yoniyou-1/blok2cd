<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Admin\Tipodoc;
//use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ValidacionDocumento;
use Illuminate\Support\Facades\Storage;
//pongo este
use App\Models\Admin\Question;
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
        //quito este
        //$datas = Documento::orderBy('id')->get();
        //pongo este
        $datas = Documento::with('tipodocs')->orderBy('id')->get();
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
        //quito este
        //return view('documento.crear');
        //pongo este
        $tipodocs = Tipodoc::orderBy('id')->pluck('name', 'id')->toArray();
        return view('documento.crear', compact('tipodocs'));
    }
        
    public function preguntadoc(Request $request)
    {
        //$questions = Question::orderBy('id')->get(['id','name'])->where('id', $request->tipodoc_id);
        
        //$questions = Question::orderBy('id')->get(['id','name'])->where('id', $request->tipodoc_id)->first();

        // $tipodocs = Tipodoc::orderBy('id')->pluck('name', 'id')->toArray();
        // $questions = Question::get();
        // $questionstipodocs = Question::with('tipodocs')->get()->pluck('tipodocs', 'id')->toArray();

        // $tipodocs = Tipodoc::orderBy('id')->pluck('name', 'id')->where('id', $request->tipodoc_id)->toArray();
        //  $questions = Question::get();
        //  $questionstipodocs = Question::with('tipodocs')->get()->pluck('tipodocs', 'id')->toArray();
       /* $a = 1;
        $questionstipodocs = DB::table('questions')
        ->join('questions_tipodocs', function ($join, $tipo = 2) {
            $join->on('questions_tipodocs.question_id', '=', 'questions.id')
            ->where('questions_tipodocs.tipodoc_id', '=',  $tipo);
        })
        ->get();*/

        $tipodoc_id=$request->tipodoc_id;
        $questionstipodocs = DB::table('questions')
                ->join('questions_tipodocs', 'questions_tipodocs.question_id', '=','questions.id')
                ->where('questions_tipodocs.tipodoc_id', '=',  $tipodoc_id)
                ->get();


/*        $results = DB::table('questions')
                        ->distinct()
                        ->leftJoin('questions_tipodocs', function($join)
                            {
                                $join->on('questions.id', '=', 'questions_tipodocs.room_type_id');
                                $join->on('arrival','>=',DB::raw("'2012-05-01'"));
                                $join->on('arrival','<=',DB::raw("'2012-05-10'"));
                                $join->on('departure','>=',DB::raw("'2012-05-01'"));
                                $join->on('departure','<=',DB::raw("'2012-05-10'"));
                            })
                        ->where('questions_tipodocs.room_type_id', '=', NULL)
                        ->get();*/

        //$a=$request->tipodoc_id;
        return response(Json_encode($questionstipodocs),200)->header('-Content-Type','text-plain');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionDocumento $request)
    {   

        // ya listo $usuario = Usuario::create($request->all());

        //ya listo $usuario->roles()->attach($request->rol_id);
        

        //dd($request->all());
        //$documento = Documento::create($request->all());
        if ($foto = Documento::setCaratula($request->foto_up))
           $request->request->add(['foto' => $foto]);
        //dd($request->all());

        //quito este
        //Documento::create($request->all());
        //pongo este
         $documento = Documento::create($request->all());
         $documento->tipodocs()->attach($request->tipodoc_id);


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
        can('editar-documento');
        //quito este
        //$data = Documento::findOrFail($id);
        //return view('documento.editar', compact('data'));
        //pongo este
        //ya listo $rols = Rol::orderBy('id')->pluck('name', 'id')->toArray();
        //ya listo $data = Usuario::with('roles')->findOrFail($id);
        //ya listo return view('admin.usuario.editar', compact('data', 'rols'));

        $tipodocs = Tipodoc::orderBy('id')->pluck('name', 'id')->toArray();
        $data = Documento::with('tipodocs')->findOrFail($id);
        return view('documento.editar', compact('data', 'tipodocs'));

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

        //quito este
        // $documento = Documento::findOrFail($id);
        // if ($foto = Documento::setCaratula($request->foto_up, $documento->foto))
        //     $request->request->add(['foto' => $foto]);
        // $documento->update($request->all());
        // return redirect()->route('documento')->with('mensaje', 'El documento se actualizó correctamente');


        //pongo este

        //$usuario = Usuario::findOrFail($id);
        $documento = Documento::findOrFail($id);


        if ($foto = Documento::setCaratula($request->foto_up, $documento->foto))
            $request->request->add(['foto' => $foto]);


        //$usuario->update(array_filter($request->all()));
        $documento->update(array_filter($request->all()));
        //$usuario->roles()->sync($request->rol_id);
        $documento->tipodocs()->sync($request->tipodoc_id);
        //return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
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
        can('eliminar-documento');
        //quito este
        // if ($request->ajax()) {
        //     $documento = Documento::findOrFail($id);
        //     if (Documento::destroy($id)) {
        //         Storage::disk('public')->delete("imagenes/caratulas/$documento->foto");
        //         return response()->json(['mensaje' => 'ok']);
        //     } else {
        //         return response()->json(['mensaje' => 'ng']);
        //     }
        // } else {
        //     abort(404);
        // }

        //pongo este

        if ($request->ajax()) {
            $documento = Documento::findOrFail($id);
            $documento->tipodocs()->detach();
            if (Documento::destroy($id)) {
                Storage::disk('public')->delete("imagenes/caratulas/$documento->foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }

        //if ($request->ajax()) {
         //   $usuario = Usuario::findOrFail($id);
        //     $usuario->roles()->detach();
        //     $usuario->delete();
        //     return response()->json(['mensaje' => 'ok']);
        //  } else {
        //     abort(404);
        // }



    }
}
