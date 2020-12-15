<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tiposolicitud extends Model
{
    
    protected $table = "tiposolicitudes";
    protected $fillable = ['name'];
    protected $guarded = ['id'];


    public function documentos()
    {
        //return $this->hasMany(Tiposolicitud::class,  'tiposolicitud_id');
        return $this->hasMany(Documento::class);
    }
}
