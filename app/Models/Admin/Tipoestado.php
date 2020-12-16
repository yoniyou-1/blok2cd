<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tipoestado extends Model
{
    protected $table = "tipoestados";
    protected $fillable = ['name'];
    protected $guarded = ['id'];

    public function tipodocs()
    {
        return $this->belongsToMany(Tipodoc::class, 'tipoestados_tipodocs', 'tipoestado_id', 'tipodoc_id');
    }
    
}
