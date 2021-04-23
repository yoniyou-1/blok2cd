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

class DocumentosExportVer0 implements FromView
{   

    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function view(): View
    {   

        //dd($this->id);
        
        return view('exports.documento.ver0', [
            'datas' =>  $datas = Documento::with('tipodocs','questions','usuarios','tiposolicitud','tipoestados','files','tipofechas','refexternas')->where('documentos.id', $this->id)->orderBy('id')->get(),
           'tiposolicituds' => $tiposolicituds = Tiposolicitud::orderBy('id')->get()
        ]);

    }
}