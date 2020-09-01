<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Permission;
use App\Models\Admin\Rol;

class PermissionsRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::orderBy('id')->pluck('name', 'id')->toArray();
        $permissions = Permission::get();
        $permissionsRols = Permission::with('roles')->get()->pluck('roles', 'id')->toArray();
        return view('admin.permiso-rol.index', compact('rols', 'permissions', 'permissionsRols'));

       
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
            $permissions = new Permission();
            if ($request->input('estado') == 1) {
                $permissions->find($request->input('permission_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asigno correctamente']);
            } else {
                $permissions->find($request->input('permission_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se elimino correctamente']);
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
