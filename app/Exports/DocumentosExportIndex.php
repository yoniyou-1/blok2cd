<?php

namespace App\Exports;
//use DB;
//use App\User;
use Illuminate\Support\Facades\DB;


use App\Models\Documento;
use App\Models\Admin\Tiposolicitud;
use App\Models\Admin\Tipodoc;

/*
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
*/


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DocumentosExportIndex implements FromView
{
    public function view(): View
    {
        /*return view('exports.docu', [
            $datas = Documento::with('tiposolicitud')->orderBy('id')->get()
        ]);*/
        /*$tiposolicituds = Tiposolicitud::orderBy('id')->pluck('name', 'id')->toArray();*/
        return view('exports.documento.index', [
            'datas' =>  $datas = Documento::with('tipodocs','questions','usuarios','tiposolicitud','tipoestados','files','tipofechas','refexternas')->orderBy('id')->get(),
           'tiposolicituds' => $tiposolicituds = Tiposolicitud::orderBy('id')->get()
        ]);

    }
}