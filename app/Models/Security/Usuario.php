<?php

namespace App\Models\Security;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{


    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $fillable = ['user', 'name', 'password'];
    protected $guarded = ['id'];

}