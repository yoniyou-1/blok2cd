<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Menu;
use App\Http\Requests\ValidacionMenu;
class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::getMenu();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionMenu $request)
    {
       Menu::create($request->all());
      return redirect('admin/menu/crear')->with('mensaje','menu creado con exito');
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
        $data = Menu::findOrFail($id);
        return view('admin.menu.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionMenu $request, $id)
    {
        Menu::findOrFail($id)->update($request->all());
        return redirect('admin/menu')->with('mensaje', 'Menú actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {

        //tu código
            Menu::destroy($id);
        return redirect('admin/menu')->with('mensaje', 'Menú eliminado con exito');

        }catch (\Illuminate\Database\QueryException $e){
        //tu código
        return redirect('admin/menu')->with('mensaje', 'El registro no pudo ser eliminado, hay recursos usandolo, SAIR, error');
        }



    }

    public function saveOrden(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->saveOrden($request->menu);
            return response()->json(['response' => 'ok']);
        } else {
            abort(404);
        }
    }
}
