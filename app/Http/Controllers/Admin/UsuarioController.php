<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Security\Usuario;
use App\Models\Admin\Rol;
use App\Http\Requests\ValidacionUsuario;
use DataTables;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    
    public function indexa()
    {
        /*$datas = Usuario::with('roles:name as namerol')
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name')->get();
             dd($datas);*/
             /*$datas = Usuario::join('usuarios_roles','usuarios.id' , '=','usuarios_roles.usuario_id')
             ->join('roles', 'roles.id', '=','usuarios_roles.rol_id' )
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name', 'roles.name as namerol')->get();
             dd($datas);*/
             /*$datas = Usuario::with('roles:name')
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name');
             dd($datas);*/
             /*$datas = Usuario::with('roles')
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name')->get();
             dd($datas);*/

             /*$datas = Usuario::with(array('roles'=>function($query){
                    $query->select('name');
                        }))->get();
             dd($datas);*/
    }
    public function index(Request $request)
    {
       /* $datas = Usuario::with('roles')->orderBy('id')->get();
        
       
        return view('admin.usuario.index', compact('datas'));*/

        /*<form action="'.route('eliminar_usuario', $row->id).'" class="d-inline form-eliminar" method="POST">
                                                <meta name="_token" content="csrf_token()"> method("delete")
                                                <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                                    <i class="fa fa-fw fa-trash text-danger"></i>
                                                </b*/

        if ($request->ajax()) {

            //$datas = Usuario::with(['roles:name'])->select(['id','user','name'])->orderBy('id', 'desc')->get();
            // $datas = Usuario::with('roles');
            //$datas = Usuario::with('roles:name as nane')->select(['id','user','name']);
            //$sql = 'select usuarios.id as ida, usuarios.user, usuarios.name as namea, roles.id, roles.name from `roles` inner join `usuarios_roles` on `roles`.`id` = `usuarios_roles`.`rol_id` inner join `usuarios` on `usuarios_roles`.`usuario_id` = `usuarios`.`id`';
            //$datas = \DB::select($sql);
            
            //$datas = Usuario::with(['roles'])->addselect(['roles.id as rid','id','user','name as namea']);
            
            /*$sql = 'select usuarios.id, usuarios.user, usuarios.name as namea, roles.name from `roles` inner join `usuarios_roles` on `roles`.`id` = `usuarios_roles`.`rol_id` inner join `usuarios` on `usuarios_roles`.`usuario_id` = `usuarios`.`id`';
            $datas = \DB::select($sql);*/

             /*$datas = Usuario::join('usuarios_roles','usuarios.id' , '=','usuarios_roles.usuario_id')
             ->join('roles', 'roles.id', '=','usuarios_roles.rol_id' )
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name as namea', 'roles.name');*/

             
            //$datas = Usuario::with('roles:name')->select(['id','user','name']);
            //$datas = Usuario::with(['roles:name'])->select(['id','user','name'])->orderBy('id', 'desc')->get();
            /*$sql = 'select usuarios.id, usuarios.user, usuarios.name, roles.name as namerol from `usuarios` inner join `usuarios_roles` on `usuarios`.`id` = `usuarios_roles`.`usuario_id` inner join `roles` on  `roles`.`id` = `usuarios_roles`.`rol_id`';
            $datas = \DB::select($sql);*/

            /*$datas = Usuario::join('usuarios_roles','usuarios.id' , '=','usuarios_roles.usuario_id')
             ->join('roles', 'roles.id', '=','usuarios_roles.rol_id' )
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name', 'roles.name as namerol')->get();*/

             /*$datas = Usuario::with('roles:name')
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name');*/

             /*$datas = Usuario::with('roles')->select('roles.name as namerol')
             ->addSelect('usuarios.id', 'usuarios.user', 'usuarios.name')->get();*/

             /*$datas = Usuario::with('roles')->select('name as namerol')
             ->addSelect('usuarios.id', 'usuarios.user', 'usuarios.name')->get();*/

             /*$datas = Usuario::with('roles:name')
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name');*/

             /*$Usuario = User::all();
             $associates = Rol::all();
             $datas = $users->merge($associates);*/

             /*$datas = Usuario::with('roles:name')
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name');*/

              /* $datas = Usuario::with(array('roles'=>function($query){
                    $query->select('name');
                        }))->get();*/

            $datas = Usuario::join('usuarios_roles','usuarios.id' , '=','usuarios_roles.usuario_id')
             ->join('roles', 'roles.id', '=','usuarios_roles.rol_id' )
             ->select('usuarios.id', 'usuarios.user', 'usuarios.name', 'roles.name as roles.name', 'usuarios.created_at')->get();

            return Datatables::of($datas)
            ->addIndexColumn()
            ->editColumn('created_at', function ($request) {
            return $request->created_at->format('Y-m-d\ H:i'); // human readable format
            })
            ->addColumn('action', function($row){
            //$va = 2;  
            //$btn = '<a href="usuario/'.$va.'/editar"> aaa </a>';
            $btn = '<a href="'.route('editar_usuario', $row->id).'" class="btn-accion-tabla tooltipsC" title="Editar este registro"> <i class="fa fa-fw fa-circle"></i> </a>

            <form action="'.route('eliminar_usuario', $row->id).'" class="d-inline form-eliminar" method="POST">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                                <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                                    <i class="fa fa-fw fa-trash text-danger"></i>
                                                </button>
                                                 
                                            </form>'

            ;
    
                            return $btn;
                    })
            ->rawColumns(['action'])
                    
                    ->toJson();
                    //->make(true);

           //dd($btn);         
        }

        
            return view('admin.usuario.index');
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Rol::orderBy('id')->pluck('name', 'id')->toArray();
        return view('admin.usuario.crear', compact('rols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionUsuario $request)
    {

        $usuario = Usuario::create($request->all());

        $usuario->roles()->attach($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario creado con exito');
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
        $rols = Rol::orderBy('id')->pluck('name', 'id')->toArray();
        $data = Usuario::with('roles')->findOrFail($id);
        return view('admin.usuario.editar', compact('data', 'rols'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionUsuario $request, $id)
    {
        //Usuario::findOrFail($id)->update(array_filter($request->all()));
        $usuario = Usuario::findOrFail($id);
        $usuario->update(array_filter($request->all()));
        $usuario->roles()->sync($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
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
            $usuario = Usuario::findOrFail($id);
            $usuario->roles()->detach();
            $usuario->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
