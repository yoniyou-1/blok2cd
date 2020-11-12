<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = ['name'];
    protected $guarded = ['id'];

    public function tipodocs()
    {
        return $this->belongsToMany(Tipodoc::class, 'questions_tipodocs', 'question_id', 'tipodoc_id');
    }

}
