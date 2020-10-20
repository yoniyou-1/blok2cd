<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tipodoc extends Model
{
    protected $table = "Tipodocs";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
