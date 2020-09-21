<?php

namespace App\Models\Security;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class Usuario extends Authenticatable
{


    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $fillable = ['user', 'name', 'password','dni','lastname'];
    protected $guarded = ['id'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuarios_roles')->withTimestamps();
    }

    public function setSession($roles)
    {
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_name' => $roles[0]['name'],
                    'user' => $this->user,
                    'user_id' => $this->id,
                    'usuario_name' => $this->name
                ]
            );
        }
    }

    
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

}