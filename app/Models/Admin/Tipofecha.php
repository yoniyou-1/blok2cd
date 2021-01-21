<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
/*para las vistas*/
use App\Models\Security\Usuario;
use App\Models\Documento;



class Tipofecha extends Model
{
    protected $table = "tipofechas";
    protected $fillable = ['name'];
    protected $guarded = ['id'];

     public function tipodocs()
    {
        return $this->belongsToMany(Tipodoc::class, 'tipofechas_tipodocs', 'tipofecha_id', 'tipodoc_id');
    }

	/*para las vistas*/
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'documentos_usuarios', 'tipofecha_id', 'usuario_id')->withPivot('state','fechaini','fechafin', 'documento_id');
    }

    public function documentos()
    {
        return $this->belongsToMany(Documento::class, 'documentos_usuarios', 'tipofecha_id', 'documento_id')->withPivot('state','fechaini','fechafin', 'usuario_id');
    }



}
