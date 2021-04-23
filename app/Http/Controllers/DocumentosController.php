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
use App\Models\Security\Usuario;
use App\Models\Admin\Tiposolicitud;
use App\Models\Admin\Tipoestado;
use App\Models\File;
use App\Models\Admin\Tipofecha;
use App\Models\Admin\Refexterna;
//exporte en excel
use App\Exports\DocumentosExport;
use App\Exports\DocumentosExportIndex;
use App\Exports\DocumentosExportVer;
use App\Exports\DocumentosExportVer0;
use App\Exports\DocumentosExportVer2;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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
        //quito este2
        //$datas = Documento::with('tipodocs')->orderBy('id')->get();
        //pongo este2
        $datas = Documento::with('tipodocs','questions','usuarios','tiposolicitud','tipoestados','files','tipofechas','refexternas')->orderBy('id')->get();
        //dd($datas);
        return view('documento.index', compact('datas'));

    }

    /**
     * eportar en excel 
     * @use App\Exports\DocumentosExport;
     * @use Maatwebsite\Excel\Facades\Excel;
     */
    public function DocumentosExportListExcel(){
        return Excel::download(new DocumentosExport, 'documentos.xlsx');
    }

    public function DocumentosExportIndex(){

        return Excel::download(new DocumentosExportIndex, 'documentoslist.xlsx');
    }

    public function DocumentosExportVer($id){


        return Excel::download(new DocumentosExportVer($id), 'documentover.xlsx');
   
    }
    
    public function DocumentosExportVer0($id){

        return Excel::download(new DocumentosExportVer0($id), 'documentover.xlsx');
    }

    /*public function DocumentosExportVerpdf($id){

        return Excel::download(new DocumentosExportVer($id), 'documentover.xlsx');
    }*/


    public function DocumentosExportVer2($id){

        //retun Excel::download(new DocumentosExportVer($id), 'documentover.xlsx');
        return Excel::download(new DocumentosExportVer2($id), 'documentover.xlsx');
        //
        //return (new DocumentosExportVer($id))->export('documentover.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
            //$pdf = \PDF::loadView('documento.ver', compact('documento'));
            //return $pdf->download('ver.pdf');
            // $dompdf = new DOMPDF(, $dompdf->load_html(
            // 
           //$pdf = \PDF::loadView(new DocumentosExportVer($id));
           //return $pdf->download('ver.pdf');
          
            
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
        $tiposolicituds = Tiposolicitud::orderBy('id')->pluck('name', 'id')->toArray();
        return view('documento.crear', compact('tipodocs','tiposolicituds'));
    }
        
    public function createpreguntadocajax(Request $request)
    {
        //$questions = Question::orderBy('id')->get(['id','name'])->where('id', $request->tipodoc_id)->first();

        $tipodoc_id=$request->tipodoc_id;
        $questionstipodocs = DB::table('questions')
                ->join('questions_tipodocs', 'questions_tipodocs.question_id', '=','questions.id')
                ->where('questions_tipodocs.tipodoc_id', '=',  $tipodoc_id)
                ->get();

        return response(Json_encode($questionstipodocs),200)->header('-Content-Type','text-plain');
    }

    public function createpreguntadocajax2(Request $request)
    {
        //$questions = Question::orderBy('id')->get(['id','name'])->where('id', $request->tipodoc_id)->first();

        $tipodoc_id=$request->tipodoc_id;
        $tipoestadostipodocs = DB::table('tipoestados')
                ->join('tipoestados_tipodocs', 'tipoestados_tipodocs.tipoestado_id', '=','tipoestados.id')
                ->where('tipoestados_tipodocs.tipodoc_id', '=',  $tipodoc_id)
                ->get();

        return response(Json_encode($tipoestadostipodocs),200)->header('-Content-Type','text-plain');
    }

    public function createtipofechaajax3(Request $request)
    {
        //$questions = Question::orderBy('id')->get(['id','name'])->where('id', $request->tipodoc_id)->first();

        $tipodoc_id=$request->tipodoc_id;
        $tipofechastipodocs = DB::table('tipofechas')
                ->join('tipofechas_tipodocs', 'tipofechas_tipodocs.tipofecha_id', '=','tipofechas.id')
                ->where('tipofechas_tipodocs.tipodoc_id', '=',  $tipodoc_id)
                ->get();

        return response(Json_encode($tipofechastipodocs),200)->header('-Content-Type','text-plain');
    }

    public function createexiteidentificadorajax4(Request $request)
    {
        //$questions = Question::orderBy('id')->get(['id','name'])->where('id', $request->tipodoc_id)->first();

        $tablex = 'documentos';
        /*$documento_id = Documento::orderBy('id')->get(['id'])->where('identificador', $request->identificador)->first();
        $info = Documento::with('tipodocs')->findOrFail($documento_id);
        $tipodoc_id = $info->tipodocs[0]->id;*/


        
        $result = \DB::table($tablex)
                ->join('documentos_tipodocs', 'documentos_tipodocs.documento_id', '=', $tablex.'.id')
                ->select( \DB::raw( 1 ))
                //->select($tablex.'.*', 'documentos_tipodocs.tipodoc_id')
                ->where('documentos.identificador', '=', $request->identificador)
                ->where('documentos.ncontrol', '=', $request->ncontrol)
                ->where('documentos_tipodocs.tipodoc_id', '=', $request->tipodoc_id)
                //->where($tablex.'.id', '!=', $this->route('id'))
                ->first();       
       

        return response(Json_encode(empty( $result )),200)->header('-Content-Type','text-plain');
    }

    public function createrefexternadocajax5(Request $request)
    {
        //$questions = Question::orderBy('id')->get(['id','name'])->where('id', $request->tipodoc_id)->first();

        $tipodoc_id=$request->tipodoc_id;
        $refexternastipodocs = DB::table('refexternas')
                ->join('refexternas_tipodocs', 'refexternas_tipodocs.refexterna_id', '=','refexternas.id')
                ->where('refexternas_tipodocs.tipodoc_id', '=',  $tipodoc_id)
                ->get();

        return response(Json_encode($refexternastipodocs),200)->header('-Content-Type','text-plain');
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
        $max_size = (int)ini_get('upload_max_filesize') * 10240;




    //dd($request->all());        
    /*$data = $request->session()->all();
    dd($data);
    /*    if(isset($request->fechaini)){
        $datetime = array_values($request->fechaini);
    dd($request->all(),$datetime);
        }else{dd('ho hay array fechaini');}*/

        // ya listo $usuario = Usuario::create($request->all());

        //ya listo $usuario->roles()->attach($request->rol_id);
        
        //$datetime = array_values($request->fechaini);
        
        //dd($request->all(),$datemie);
        //$documento = Documento::create($request->all());
        if ($foto = Documento::setCaratula($request->foto_up))
           $request->request->add(['foto' => $foto]);
        //dd($request->all());

        //quito este
        //Documento::create($request->all());
        //pongo este
         $documento = Documento::create($request->all());
         $documento->tipodocs()->attach($request->tipodoc_id);

         $documento_id = Documento::latest('id')->pluck('id')->first();
         //dd($documento_id);
         $files = $request->file('file_up');
         //dd($files);
         if($request->hasFile('file_up'))
         {
             foreach($files as $file)
             {  
                if (Storage::putFileAs('/public/archivos/'.$documento_id.'/', $file, $file->getClientOriginalName() ))
                 {
                    File::create([
                    'name' => $file->getClientOriginalName(),
                    'documento_id' => $documento_id,
                    'extension' => $file->getClientOriginalExtension(),
                    ]);
                 }
             }
          }   
         /*foreach($files as $file)
         {
             File::create([
                'name' => $file->getClientOriginalName(),
                'documento_id' => $documento_id
             ]);
         }*/



         $documento->tipoestados()->attach($request->tipoestado_id);
         $documento->refexternas()->attach($request->refexterna_id);
         //$documento->tipoestados()->attach($request->tipodoc_id);
         //dd($documento->tipoestados('tipoestado_id'));
         //$documento->questions()->attach(1);
         //$documento->questions()->sync($request->question_id);
         //$combination = array_combine($request->question_id, $request->state);
         //dd($combination);
         //$documento->questions()->sync($combination);

         //dd($request->question_id);
         //$documento->questions()->sync($request->question_id);

/*         $array = [
    ['question_id' => 1, 'state' => '3'],
    ['question_id' => 2, 'state' => '4'],];*/
    //si no vienen fechas de convocatorias

/*    if(!isset($request->fechaini)){
    dd($request->all(),$datetime);
        }*/
if(isset($request->fechaini)){
$user_id = $request->session()->get('user_id');
$nrofechaini = count ($request->fechaini);
$arrayfechaini = array_values($request->fechaini);
$arrayfechafin = array_values($request->fechafin);
$arraytipofecha_id = array_values($request->tipofecha_id);

if($nrofechaini>1){
//$arrayfechaini = array_values($request->fechaini);
    
    $i=0;
    $fechamenor = $arrayfechaini[0];
    while($i < $nrofechaini)
    {   
        if ($fechamenor < $arrayfechaini[$i] )
        {
        }else{
         $fechamenor = $arrayfechaini[$i];
        }
        $i++;
    }
    $i=0;
    $fechamayor = $arrayfechafin[0];
    while($i < $nrofechaini)
    {   
        if ($fechamayor > $arrayfechafin[$i] )
        {
        }else{
         $fechamayor = $arrayfechafin[$i];
        }
        $i++;
    }


    $i=0;
    while($i < $nrofechaini)
    {
        if($fechamenor == $arrayfechaini[$i]){$state = 1;}else{
         if($fechamayor == $arrayfechafin[$i]){$state = 3; }else{$state =0;}}
         $arrayconvocatorias[] = ['fechaini' => $arrayfechaini[$i] ,'fechafin' => $arrayfechafin[$i],'tipofecha_id' => $arraytipofecha_id[$i] ,'state' =>  $state,'usuario_id' =>  $user_id,];
        $i++;
    }
}else{
    //$arrayfechaini = array_values($request->fechaini);
    $i=0;
    while($i < $nrofechaini)
    {
         $arrayconvocatorias[] = ['fechaini' => $arrayfechaini[$i] ,'fechafin' => $arrayfechafin[$i],'tipofecha_id' => $arraytipofecha_id[$i] ,'state' =>  1,'usuario_id' =>  $user_id,];
        $i++;
    }

}

/*$arrayfechaini = array_values($request->fechaini);
$i=0;
while($i < $nrofechaini)
{
     $arrayconvocatorias[] = ['fechaini' => $arrayfechaini[$i] ,'state' =>  0,'usuario_id' =>  $user_id,];
    $i++;
}*/
$documento->usuarios()->sync($arrayconvocatorias);
}
//si no vienen por POST preguntas asociadas
if(!isset($request->question_id)){
 return redirect('documento')->with('mensaje', 'documento creado con exito (sin matriz de preguntas asociadas)');
}
//fin si no vienen por POST preguntas asociadas
$nroquestion_id = count ($request->question_id);

$i=0;
while($i < $nroquestion_id)
{
     $arrayquestions[] = ['question_id' => $request->question_id[$i] ,'state' =>  $request->state[$i],];
    $i++;
}
 //$state = $request->state;
        //dd($state);
/*    $nroquestion_id = count ($request->question_id);
    for($i=1 ; $i < $nroquestion_id; $i++){*/

//$state = isset($request->state[$i]) ? $request->state[$i] : 0;
        //$state = $request->state[$i];
        //dd($state);
        //if ($state == NULL) {$state = 0;} else {$state = 1;}

       /* $arrayquestions[] = ['question_id' => $request->question_id[$i] ,'state' =>  $request->state[$i],];
    

    }*/

   // $combination = array_combine($request->question_id,$request->state);
         //dd($array);
        // dd($array,$request->question_id,$request->state,$combination,$array2);
        //dd($arrayquestions);
        $documento->questions()->sync($arrayquestions);


         return redirect('documento')->with('mensaje', 'documento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show(Documento $documento)
    {
        //dd($documento);
        return view('documento.ver', compact('documento'));


    }*/
    public function show(Documento $documento)
    {

            //dd($documento);
            return view('documento.ver', compact('documento'));
            /*$pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('documento.ver', compact('documento'));
            return $pdf->download('ver.pdf');*/
             //$pdf = \PDF::loadView('documento.ver2', compact('documento'));
           // return $pdf->download('ver.pdf');

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
        //prueba con preguntas consulta del index
        //$datas = Documento::with('tipodocs','questions')->orderBy('id')->get();
        //dd($datas);
        //return view('documento.index', compact('datas'));

        $tipodocs = Tipodoc::orderBy('id')->pluck('name', 'id')->toArray();
        $tiposolicituds = Tiposolicitud::orderBy('id')->pluck('name', 'id')->toArray();
        //$files = File::orderBy('id')->pluck('name', 'id')->toArray();
        //$tipoestads = Tipoestado::orderBy('id')->pluck('name', 'id')->toArray();
        $info = Documento::with('tipodocs')->findOrFail($id);
        $tipodoc_id = $info->tipodocs[0]->id;
        $tipoestads = DB::table('tipoestados')
                ->join('tipoestados_tipodocs', 'tipoestados_tipodocs.tipoestado_id', '=','tipoestados.id')
                ->where('tipoestados_tipodocs.tipodoc_id', '=',  $tipodoc_id)
                ->get()->pluck('name', 'tipoestado_id')->toArray();
                
        $tipofechass = DB::table('tipofechas')
                ->join('tipofechas_tipodocs', 'tipofechas_tipodocs.tipofecha_id', '=','tipofechas.id')
                ->where('tipofechas_tipodocs.tipodoc_id', '=',  $tipodoc_id)
                ->get()->pluck('name', 'tipofecha_id')->toArray();

        $refexterns = DB::table('refexternas')
                ->join('refexternas_tipodocs', 'refexternas_tipodocs.refexterna_id', '=','refexternas.id')
                ->where('refexternas_tipodocs.tipodoc_id', '=',  $tipodoc_id)
                ->get()->pluck('name', 'refexterna_id')->toArray();
                
        $data = Documento::with('tipodocs','questions','usuarios','tiposolicitud','tipoestados','files')->findOrFail($id);
        //dd($tiposolicituds, $tipodocs, $tipoestads, $tipofechass, $refexterns, $data);
        return view('documento.editar', compact('data', 'tipodocs','tiposolicituds','tipoestads','tipofechass','refexterns'));

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
        //dd($request->all());
        $max_size = (int)ini_get('upload_max_filesize') * 10240;
        //$files = $request->file('file_up');
         //dd($files);


        //dd($request->all());
        //quito este
        // $documento = Documento::findOrFail($id);
        // if ($foto = Documento::setCaratula($request->foto_up, $documento->foto))
        //     $request->request->add(['foto' => $foto]);
        // $documento->update($request->all());
        // return redirect()->route('documento')->with('mensaje', 'El documento se actualizó correctamente');


        //pongo este

        //$usuario = Usuario::findOrFail($id);x
        $documento = Documento::findOrFail($id);


        if ($foto = Documento::setCaratula($request->foto_up, $documento->foto))
           $request->request->add(['foto' => $foto]);

       //dd($documento_id);
         $files = $request->file('file_up');
         //dd($files);
         if($request->hasFile('file_up'))
         {
             foreach($files as $file)
             {  
                if (Storage::putFileAs('/public/archivos/'.$id.'/', $file, $file->getClientOriginalName() ))
                 {
                    File::create([
                    'name' => $file->getClientOriginalName(),
                    'documento_id' => $id,
                    'extension' => $file->getClientOriginalExtension(),
                    ]);
                 }
             }
          }   


        //$usuario->update(array_filter($request->all()));x
        $documento->update(array_filter($request->all()));
        //$usuario->roles()->sync($request->rol_id);x
        $documento->tipodocs()->sync($request->tipodoc_id);
        $documento->tipoestados()->sync($request->tipoestado_id);
        $documento->refexternas()->sync($request->refexterna_id);




        //de aqui if hay fechas
if(isset($request->fechaini)){
        $user_id = $request->session()->get('user_id');
        $nrofechaini = count ($request->fechaini);
        $arrayfechaini = array_values($request->fechaini);
        $arrayfechafin = array_values($request->fechafin);
        $arraytipofecha_id = array_values($request->tipofecha_id);
        if(isset($request->usuario_id)){
        $arrayusuario_id = array_values($request->usuario_id);
        }
    if($nrofechaini>1){
        //$arrayfechaini = array_values($request->fechaini);
    
        $i=0;
        $fechamenor = $arrayfechaini[0];
        while($i < $nrofechaini)
        {   
            if ($fechamenor < $arrayfechaini[$i] )
            {
            }else{
             $fechamenor = $arrayfechaini[$i];
            }
            $i++;
        }
        $i=0;
        $fechamayor = $arrayfechafin[0];
        while($i < $nrofechaini)
        {   
            if ($fechamayor > $arrayfechafin[$i] )
            {
            }else{
             $fechamayor = $arrayfechafin[$i];
            }
            $i++;
        }


        $i=0;
        while($i < $nrofechaini)
        {
            if($fechamenor == $arrayfechaini[$i]){$state = 1;}else{
             if($fechamayor == $arrayfechafin[$i]){$state = 3; }else{$state =0;}}
             $arrayconvocatorias[] = ['fechaini' => $arrayfechaini[$i] ,'fechafin' => $arrayfechafin[$i] ,'tipofecha_id' => $arraytipofecha_id[$i] ,'state' =>  $state,'usuario_id' =>  $arrayusuario_id[$i] ?? $user_id ,];
            $i++;
        }
    }else{
        //$arrayfechaini = array_values($request->fechaini);
        $i=0;
        while($i < $nrofechaini)
        {
             $arrayconvocatorias[] = ['fechaini' => $arrayfechaini[$i] ,'fechafin' => $arrayfechafin[$i] ,'tipofecha_id' => $arraytipofecha_id[$i] ,'state' =>  1,'usuario_id' =>  $arrayusuario_id[$i] ?? $user_id,];
            $i++;
        }

    }
//dd($arrayconvocatorias);
//x
    $documento->usuarios()->detach();
    $documento->usuarios()->sync($arrayconvocatorias);
}else{
    $documento->usuarios()->detach();
}







        //de aqui en adelante para preguntas
        if(!isset($request->question_id)){
         return redirect('documento')->with('mensaje', 'documento creado con exito (sin matriz de preguntas asociadas)');
        }
        //fin si no vienen por POST preguntas asociadas
        $nroquestion_id = count ($request->question_id);

        $i=0;
        //dd($request->question_id);
        while($i < $nroquestion_id)
        {
            $arrayquestions[] = ['question_id' => $request->question_id[$i] ,'state' =>  $request->state[$i],];
            $i++;
        }
        //dd($arrayquestions);x
        $documento->questions()->detach();
        $documento->questions()->sync($arrayquestions);
        return redirect()->route('documento')->with('mensaje', 'El documento se actualizó correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroyfile(Request $request)
    {   
if ($request->ajax()) {

    $file_id = $request->id;
    $documento_id = $request->documentoajax;

    $file_name = $request->name;

    
    if (File::destroy($file_id)) {
                unlink(public_path('storage'.'/archivos/'.$documento_id.'/'.$file_name));
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
    
}
        //$id=$request->id;
        //$id= "holala";

        /*return response(Json_encode($file_id),200)->header('-Content-Type','text-plain');*/

        /*$documento_id = File::where("id","=",$id)->pluck('documento_id')->first();;
        dd($documento_id);*/
        /*
        if (File::destroy($id)) {
                unlink(public_path('storage'.'/archivos/2/bb.pdf'));
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
        */
    }
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
            $documento->usuarios()->detach();
            $documento->questions()->detach();
            $documento->tipoestados()->detach();
            $documento->refexternas()->detach();
            //$documento->files()->detach(); esta en cascada la eliminacion de files
            //unlink(public_path('storage'.'/archivos/2/bb.pdf'));
            //Storage::disk('public')->delete("imagenes/caratulas/$documento->foto");

            //Eliminar archivos y carpetas
            function deleteDirectory($dir) {
            if(!$dh = @opendir($dir)) return;
            while (false !== ($current = readdir($dh))) {
                if($current != '.' && $current != '..') {
                    //echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
                    if (!@unlink($dir.'/'.$current)) 
                        deleteDirectory($dir.'/'.$current);
                }       
            }
            closedir($dh);
            //echo 'Se ha borrado el directorio '.$dir.'<br/>';
            @rmdir($dir);
             }

             $carpetadelete = public_path('storage'.'/archivos/'.$id);
             deleteDirectory($carpetadelete);
             //Fin Eliminar archivos y carpetas

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
