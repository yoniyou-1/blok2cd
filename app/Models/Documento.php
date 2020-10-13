<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
//use Intervention\Image\Facades\Image as Image;

class Documento extends Model
{
    protected $table = "documentos";
    protected $fillable = ['tipo_document_id','identificador','title','ncontrol','tipo_solicitud','observation','estado','foto'];
    protected $guarded = ['id'];

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
}
