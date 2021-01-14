<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tipofecha extends Model
{
    protected $table = "tipofechas";
    protected $fillable = ['name'];
    protected $guarded = ['id'];

     public function tipodocs()
    {
        return $this->belongsToMany(Tipodoc::class, 'tipofechas_tipodocs', 'tipofecha_id', 'tipodoc_id');
    }

}
