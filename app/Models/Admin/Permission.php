<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "permissions";
    protected $fillable = ['name', 'slug'];
    protected $guarded = ['id'];

     public function roles()
    {
        return $this->belongsToMany(Rol::class, 'permissions_roles', 'permission_id', 'rol_id');
    }
}
