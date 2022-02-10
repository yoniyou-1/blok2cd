<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
//xtra
use App\Models\Security\Usuario;

class Rol extends Model
{
    protected $table = "roles";
    protected $fillable = ['name'];
    protected $guarded = ['id'];



//xtra
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuarios_roles', 'usuario_id', 'rol_id')->withTimestamps();
    }



}

