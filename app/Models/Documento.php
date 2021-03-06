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
use App\Models\Security\Usuario;
use App\Models\Admin\Tiposolicitud;
use App\Models\Admin\Tipoestado;
/*App\Models\Admin\File  Aqui de ser nesesario*/
use App\Models\Admin\Tipofecha;
use App\Models\Admin\Refexterna;

class Documento extends Model
{
    protected $table = "documentos";
    protected $fillable = ['identificador','title','ncontrol','tiposolicitud_id','observation','foto'];
    protected $guarded = ['id'];

        public function tipodocs()
    {
        return $this->belongsToMany(Tipodoc::class, 'documentos_tipodocs', 'documento_id', 'tipodoc_id')->withTimestamps();
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
        return $this->belongsToMany(Question::class, 'documentos_questions', 'documento_id', 'question_id')->withPivot('state');
    }
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'documentos_usuarios', 'documento_id', 'usuario_id')->withPivot('state','fechaini','fechafin', 'tipofecha_id');
    }

    public function tiposolicitud()
    {
        //return $this->hasMany(Tiposolicitud::class,  'tiposolicitud_id');
        return $this->belongsTo(Tiposolicitud::class);
    }

    public function tipoestados()
    {
        return $this->belongsToMany(Tipoestado::class, 'documentos_tipoestados', 'documento_id', 'tipoestado_id')->withTimestamps();
    }

        public function files()
    {
        //return $this->hasMany(Tiposolicitud::class,  'tiposolicitud_id');
        return $this->hasMany(File::class);
    }

    public function tipofechas()
    {
        return $this->belongsToMany(Tipofecha::class, 'documentos_usuarios', 'documento_id', 'tipofecha_id')->withPivot('state','fechaini','fechafin', 'usuario_id')->withTimestamps();
    }

    public function refexternas()
    {
        return $this->belongsToMany(Refexterna::class, 'documentos_refexternas', 'documento_id', 'refexterna_id')->withTimestamps();
    }


}
