<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = ['name', 'slug'];
    protected $guarded = ['id'];

    public function tipodocs()
    {
        return $this->belongsToMany(Rol::class, 'questions_tipodocs', 'question_id', 'tipodoc_id');
    }

}
