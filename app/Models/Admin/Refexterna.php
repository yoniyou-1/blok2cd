<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Refexterna extends Model
{
    protected $table = "refexternas";
    protected $fillable = ['name'];
    protected $guarded = ['id'];

   	public function tipodocs()
    {
        return $this->belongsToMany(Tipodoc::class, 'refexternas_tipodocs', 'refexterna_id', 'tipodoc_id');
    }
}
