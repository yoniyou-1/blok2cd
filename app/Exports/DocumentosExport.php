<?php

namespace App\Exports;
//use DB;
//use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\Documento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DocumentosExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Identificador',
            'Titulo1',
            'Tipo de Solicitud',
        ];
    }
    public function collection()
    {
         $documentos = DB::table('documentos')->select('id','identificador', 'title', 'tiposolicitud_id')->get();
         return $documentos;

    }
}