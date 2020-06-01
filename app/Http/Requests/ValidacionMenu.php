<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarCampoUrl;

class ValidacionMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name'=>'required|max:50|unique:menus,name,'.$this->route('id'),
            'url'=>['required','max:100', NEW ValidarCampoUrl],
            'icon'=>'nullable|max:50'

        ];
    }

     public function messages()
    {
        return [
            'name.required'=>'El campo Nombre es requerido',
            'url.required'=>'El campo Url es requerido',
            'icon'=>'nullable|max:50'

        ];
    }
}
