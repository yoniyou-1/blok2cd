<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tipofecha extends Model
{
    protected $table = "tipofechas";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
