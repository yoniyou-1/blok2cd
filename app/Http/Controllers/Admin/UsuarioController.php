<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Security\Usuario;
use App\Models\Admin\Rol;
use App\Http\Requests\ValidacionUsuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Usuario::orderBy('id')->get();
        return view('admin.usuario.index', compact('datas'));
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
        Usuario::findOrFail($id)->update(array_filter($request->all()));
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
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
