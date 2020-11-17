<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
//use Intervention\Image\Facades\Image as Image;
//pongo esto
use App\Models\Admin\Tipodoc;
use App\Models\Admin\Question;

class Documento extends Model
{
    protected $table = "documentos";
    protected $fillable = ['identificador','title','ncontrol','tipo_solicitud','observation','estado','foto'];
    protected $guarded = ['id'];

        public function tipodocs()
    {
        return $this->belongsToMany(Tipodoc::class, 'documentos_tipodocs')->withTimestamps();
    }

    public static function setCaratula($foto, $actual = false){
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/caratulas/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/caratulas/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }

/*    public function questions()
    {
        return $this->belongsToMany(Question::class, 'questions_tipodocs', 'question_id', 'tipodoc_id');
    }*/

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'documentos_questions', 'documento_id', 'question_id');
    }


}
