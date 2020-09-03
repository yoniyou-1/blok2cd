<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = "documentos";
    protected $fillable = ['tipo','identificador','title','ncontrol','tiposolicitud','observation','estado','foto'];
    protected $guarded = ['id'];
}
